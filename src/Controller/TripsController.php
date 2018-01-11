<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use \Statickidz\GoogleTranslate;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 *
 * @method \App\Model\Entity\Trip[] paginate($object = null, array $settings = [])
 */
class TripsController extends AppController {

    public function beforeFilter(Event $event) {



        parent::beforeFilter($event);

        $this->Auth->allow(['view', 'ajaxtripdata', 'ajaxcurrencyconverter']);

        $this->authcontent();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Locations', 'Tripgallery'],
            'order' => ['id' => 'DESC'],
            'conditions' => ['user_id' => $this->Auth->user('id')]
        ];
        $trips = $this->paginate($this->Trips)->toArray();

        $this->set(compact('trips'));
        $this->set('_serialize', ['trips']);
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        $id = substr(base64_decode($id), 4);

        $trip = $this->Trips->get($id, [
                    'contain' => [
                        'Locations',
                        'Tripgallery',
                        'Users',
                        'Transportations',
                        'Transportationvehicles',
                        'Triplocations' => [
                            'Locations'
                        ],
                        'Tripactivities' => [
                            'Activities'
                        ],
                        'Tripmeetingpoints',
                        'Tripprices',
                        'Tripextraconditions' => [
                            'Extraconditions'
                        ]
                    ]
                ])->toArray();

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);
        
        /*************/
        
        $this->loadModel('Wishlist');
        $wishlist = $this->Wishlist->find('all', [
            'conditions' => ['Wishlist.trip_id' => $id, 'Wishlist.user_id' => $this->Auth->user('id')]
        ])->first();
        
        $this->set('wishlist', $wishlist);
        $this->set('_serialize', ['wishlist']);
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {


        $trip = $this->Trips->newEntity();
        //if ($this->request->is('post')) {

        $user_id = $this->Auth->user('id');
        $data = array();
        $data['user_id'] = $user_id;


        $trip = $this->Trips->patchEntity($trip, $data);


        $add_trip = $this->Trips->save($trip);

        if ($add_trip) {
            //$this->Flash->success(__('The trip has been saved.'));

            return $this->redirect(['action' => 'edit', base64_encode($add_trip->id), '?' => array('step' => '1')]);
        }
        //$this->Flash->error(__('The trip could not be saved. Please, try again.'));
        //}
        $locations = $this->Trips->Locations->find('list', ['limit' => 200]);
        //$transportations = $this->Trips->Transportations->find('list', ['limit' => 200]);
        $meetingpoints = $this->Trips->Meetingpoints->find('list', ['limit' => 200]);
        $meetingpointtypes = $this->Trips->Meetingpointtypes->find('list', ['limit' => 200]);
        $tripfeatures = $this->Trips->Tripfeatures->find('list', ['limit' => 200]);
        $extraconditions = $this->Trips->Extraconditions->find('list', ['limit' => 200]);

        $activities = $this->Trips->Activities->find('list', ['limit' => 200]);


        $this->loadModel('Transportations');

        $transportations = $this->Transportations->find('all', [
            'contain' => ['Transportationvehicles']
        ]);

        $transportations = $transportations->all()->toArray();


        $this->set(compact('trip', 'locations', 'transportations', 'meetingpoints', 'meetingpointtypes', 'tripfeatures', 'extraconditions', 'activities', 'transportations'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {

        $id = base64_decode($id);

        $trip = $this->Trips->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Triplocations');
        $this->loadModel('Tripactivities');
        $this->loadModel('Tripgallery');
        $this->loadModel('Meetingpoints');
        $this->loadModel('Meetingpointtypes');
        $this->loadModel('Tripmeetingpoints');
        $this->loadModel('Tripprices');
        $this->loadModel('Extraconditions');
        $this->loadModel('Tripextraconditions');

        if ($this->request->is(['patch', 'post', 'put'])) {

            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
            $this->request->data['trip_id'] = $id;

            $session = $this->request->session();

            $this->request->data['language'] = $session->read('Config.language');
            ;

            /*             * *** Tab BASIC ***** */

            if ($this->request->data['tab'] == 'basic') {

                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;

                if ($this->request->data['stopped_locations'] != '') {

                    $this->Triplocations->deleteAll(['trip_id' => $id]);

                    $post = array();

                    for ($i = 0; $i < count($this->request->data['stopped_locations']); $i++) {

                        $post['trip_id'] = $id;
                        $post['location_id'] = $this->request->data['stopped_locations'][$i];

                        $triplocations = $this->Triplocations->newEntity();
                        $triplocations = $this->Triplocations->patchEntity($triplocations, $post);
                        $this->Triplocations->save($triplocations);
                    }
                }

                if ($this->request->data['activities'] != '') {

                    $this->Tripactivities->deleteAll(['trip_id' => $id]);

                    for ($i = 0; $i < count($this->request->data['activities']); $i++) {

                        $this->request->data['activity_id'] = $this->request->data['activities'][$i];

                        $tripactivities = $this->Tripactivities->newEntity();
                        $tripactivities = $this->Tripactivities->patchEntity($tripactivities, $this->request->data);
                        $this->Tripactivities->save($tripactivities);
                    }
                }
            }

            /*             * *** Tab BASIC (END) ***** */

            /*             * *** Tab OVERVIEW ***** */

            if ($this->request->data['tab'] == 'overview') {

                $session = $this->request->session();

                $session->read('Config.language');
                $title = $this->language($this->request->data['title_' . $session->read('Config.language')]);
                $summary = $this->language($this->request->data['summary_' . $session->read('Config.language')]);

                $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';

                $this->request->data['title_' . $change_language] = $title;
                $this->request->data['summary_' . $change_language] = $summary;

                if (isset($this->request->data['images'])) {
                    for ($i = 0; $i < count($this->request->data['images']); $i++) {
                        $fileName = $this->request->data['images'][$i]['name'];
                        $fileName = date('His') . $fileName;
                        $uploadPath = WWW_ROOT . '/images/trips/' . $fileName;
                        $actual_file[] = $fileName;
                        move_uploaded_file($this->request->data['images'][$i]['tmp_name'], $uploadPath);

                        $this->loadModel('Tripgallery');

                        $post['trip_id'] = $id;
                        $post['file'] = $fileName;

                        $tripgallery = $this->Tripgallery->newEntity();
                        $tripgallery = $this->Tripgallery->patchEntity($tripgallery, $post);
                        $this->Tripgallery->save($tripgallery);
                    }
                }
            }

            /*             * *** Tab OVERVIEW (END) ***** */

            /*             * *** REMOVE GALLERY IMAGES ***** */

            if ($this->request->data['tab'] == 'remove_gallery_image') {

                if ($this->Tripgallery->deleteAll(['id' => $this->request->data['id']])) {
                    echo 'success';
                } else {
                    echo 'error';
                }
                exit;
            }

            /*             * *** REMOVE GALLERY IMAGES (END) ***** */

            /*             * ***** AJAX (Get Meeting points from Location ID) ******* */

            if ($this->request->data['tab'] == 'get_meeting_points') {

                $meeting_points = $this->Meetingpoints->find('all', [
                            'conditions' => ['Meetingpoints.meetingpointtype_id' => $this->request->data['meetingpointtype_id']]
                        ])->all()->toArray();

                echo json_encode($meeting_points);
                exit;
            }

            /*             * ***** AJAX (Get Meeting points from Location ID) (END) ******* */

            /*             * ***** AJAX (Get Meeting point Types from Location ID) ******* */

            if ($this->request->data['tab'] == 'get_meeting_points_types') {

                $meeting_point_points = $this->Meetingpointtypes->find('all', [
                            'conditions' => ['Meetingpointtypes.location_id' => $this->request->data['location_id']]
                        ])->all()->toArray();

                echo json_encode($meeting_point_points);
                exit;
            }

            /*             * ***** AJAX (Get Meeting points Types from Location ID) (END) ******* */

            /*             * *** Tab DETAIL ***** */

            if ($this->request->data['tab'] == 'detail') {

                $session = $this->request->session();

                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;

                $this->request->data['schedule'] = json_encode($this->request->data['schedule']);

                if ($this->request->data['meetingpoints'] != 'undefined') {

                    $this->Tripmeetingpoints->deleteAll(['trip_id' => $id]);

                    $meeting_points = json_decode($this->request->data['meetingpoints']);

                    foreach ($meeting_points as $meeting_point) {
                        if ($meeting_point != null) {
                            $post = array();
                            $post['trip_id'] = $id;
                            $post['location'] = $meeting_point->location;
                            $post['meeting_point_type'] = $meeting_point->mt;
                            $post['meeting_point'] = $meeting_point->mp;
                            $post['meetingpoint_id'] = $meeting_point->mp_id;
                            $post['language'] = $session->read('Config.language');
                            ;

                            $location = $meeting_point->location . " " . $meeting_point->mt . " " . $meeting_point->mp;
                            $location = str_replace(' ', '+', $location);
                            $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&address=" . $location . "&sensor=true";
                            $details = file_get_contents($url);
                            $result = json_decode($details, true);

                            if (!empty($result['results'])) {
                                $post['latitude'] = $result['results'][0]['geometry']['location']['lat'];
                                $post['longitude'] = $result['results'][0]['geometry']['location']['lng'];
                            }

                            $tripmeetingpoints = $this->Tripmeetingpoints->newEntity();
                            $tripmeetingpoints = $this->Tripmeetingpoints->patchEntity($tripmeetingpoints, $post);
                            $this->Tripmeetingpoints->save($tripmeetingpoints);
                        }
                    }
                }
            }

            /*             * *** Tab DETAIL (ENd) ***** */


            /*             * *** Tab PRICE ***** */

            if ($this->request->data['tab'] == 'price') {

                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;

                $post = array();

                if ($this->request->data['pricing_type'] == 'basic') {

                    $this->Tripprices->deleteAll(['trip_id' => $id]);

                    $this->request->data['basic_price_per_person'] = $this->request->data['basic_single_price'];
                    $this->request->data['basic_total_price'] = $this->request->data['basic_total_price1'];
                }

                if ($this->request->data['pricing_type'] == 'advance') {

                    $this->Tripprices->deleteAll(['trip_id' => $id]);

                    $this->request->data['basic_price_per_person'] = '';
                    $this->request->data['basic_total_price'] = '';

                    $prices = $this->request->data['apricing'];

                    foreach ($prices as $price) {

                        $post['trip_id'] = $id;
                        $post['person'] = $price['persons'];
                        $post['price_per_person'] = $price['single'];
                        $post['total_price'] = $price['total_price'];

                        $tripprices = $this->Tripprices->newEntity();
                        $tripprices = $this->Tripprices->patchEntity($tripprices, $post);
                        $this->Tripprices->save($tripprices);
                    }
                }

                $session = $this->request->session();

                $session->read('Config.language');
                $extra_expense = $this->language($this->request->data['extra_expense_' . $session->read('Config.language')]);

                $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';

                $this->request->data['extra_expense_' . $change_language] = $extra_expense;

                if (isset($this->request->data['child_price_enabled'])) {
                    $this->request->data['child_price_enabled'] = 1;
                } else {
                    $this->request->data['child_price_enabled'] = 0;
                    $this->request->data['child_price_enabled'] = '0.00';
                }
            }

            /*             * *** Tab PRICE (ENd) ***** */

            /*             * *** Tab CONDITION ***** */

            if ($this->request->data['tab'] == 'condition') {

                if (isset($this->request->data['extracondition_id'])) {

                    $this->Tripextraconditions->deleteAll(['trip_id' => $id]);

                    $extraconditions = $this->request->data['extracondition_id'];

                    $post = array();

                    foreach ($extraconditions as $extracondition) {

                        $post['trip_id'] = $id;
                        $post['extracondition_id'] = $extracondition;

                        $tripextraconditions = $this->Tripextraconditions->newEntity();
                        $tripextraconditions = $this->Tripextraconditions->patchEntity($tripextraconditions, $post);
                        $this->Tripextraconditions->save($tripextraconditions);
                    }

//                    $extraconditions = array();
//                    foreach($this->request->data['extracondition_id'] as $condition){
//                        $extraconditions[] = $condition;
//                    }
//                    $extraconditions = implode(',',$extraconditions);
//                    $this->request->data['extracondition_id'] = $extraconditions;   
                }
            }

            /*             * *** Tab CONDITION (END) ***** */

            /*             * *** Tab SUBMIT ***** */

            if ($this->request->data['tab'] == 'submit') {
                $update = $this->Trips->updateAll(['request_photographer' => $this->request->data['value']], ['id' => $id]);

                if ($update) {
                    echo 'success';
                } else {
                    echo 'error';
                }

                exit;
            }

            /*             * *** Tab SUBMIT (END) ***** */

            /*             * *** Tab SUBMIT ***** */

            if ($this->request->data['tab'] == 'submit_for_approval') {
                $update = $this->Trips->updateAll(['status' => 3], ['id' => $id]); // Setting status to pending

                $json = array();

                if ($update) {
                    $json['msg'] = $this->getLanguage('text_approval_msg');
                    $json['isSuccess'] = 'true';
                } else {
                    $json['msg'] = $this->getLanguage('text_approval_msg_er');
                    $json['isSuccess'] = 'false';
                }

                echo json_encode($json);

                exit;
            }

            /*             * *** Tab SUBMIT (END) ***** */

            $this->request->data['status'] = 2;

            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            if ($this->Trips->save($trip)) {
                //$this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }


        $locations = $this->Trips->Locations->find('list', ['limit' => 200]);
        //$transportations = $this->Trips->Transportations->find('list', ['limit' => 200]);
        $meetingpoints = $this->Trips->Meetingpoints->find('list', ['limit' => 200]);
        $meetingpointtypes = $this->Trips->Meetingpointtypes->find('list', ['limit' => 200]);
        $tripfeatures = $this->Trips->Tripfeatures->find('list', ['limit' => 200]);
        $extraconditions = $this->Trips->Extraconditions->find('list', ['limit' => 200]);

        $activities = $this->Trips->Activities->find('list', ['limit' => 200]);

        /*         * *********************** */

        $this->loadModel('Transportations');

        $transportations = $this->Transportations->find('all', [
            'contain' => ['Transportationvehicles']
        ]);

        $transportations = $transportations->all()->toArray();

        /*         * ******************* */

        $extraconditions = $this->Extraconditions->find('all', [
            'contain' => []
        ]);

        $extraconditions = $extraconditions->all()->toArray();



        /*         * ********************* */

        $this->loadModel('Triplocations');

        $selected_stopped_location = $this->Triplocations->find('all', [
                    'contain' => ['Locations'],
                    'conditions' => ['Triplocations.trip_id' => $id]
                ])->all()->toArray();
        $this->set('selected_stopped_location', $selected_stopped_location);


        /*         * ********************* */


        $selected_extraconditions = $this->Tripextraconditions->find('all', [
                    'contain' => [],
                    'conditions' => ['Tripextraconditions.trip_id' => $id]
                ])->all()->toArray();
        $this->set('selected_extraconditions', $selected_extraconditions);

        /*         * ********************* */

        $selected_activities = $this->Tripactivities->find('all', ['conditions' => ['Tripactivities.trip_id' => $id]])->all()->toArray();
        $this->set('selected_activities', $selected_activities);

        /*         * ********************* */

        $galleries = $this->Tripgallery->find('all', ['conditions' => ['Tripgallery.trip_id' => $id]])->all()->toArray();
        $this->set('galleries', $galleries);

        /*         * ********************* */

        $selected_meetingpoints = $this->Tripmeetingpoints->find('all', ['conditions' => ['Tripmeetingpoints.trip_id' => $id]])->all()->toArray();
        $this->set('selected_meetingpoints', $selected_meetingpoints);

        /*         * ********************* */

        $selected_tripprices = $this->Tripprices->find('all', ['conditions' => ['Tripprices.trip_id' => $id]])->all()->toArray();
        $this->set('selected_tripprices', $selected_tripprices);

        /*         * ******************** */

//        $error = 0;
//        
//        if(empty($selected_stopped_location) || empty($selected_activities) || empty($galleries) || empty($selected_meetingpoints) || empty($selected_tripprices)){
//            $error = 1;
//        }
//        
//        foreach($trip as $trp){
//            echo $trp;
////            if($key == '' || $key == null){
////               $error = 1;
////            }
//        }

        /*         * ******************* */

        $this->set(compact('trip', 'locations', 'transportations', 'meetingpoints', 'meetingpointtypes', 'tripfeatures', 'extraconditions', 'activities', 'tripgallery', 'extraconditions'));
        $this->set('_serialize', ['trip']);

        $this->set('trip_id', $id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function language($text) {

        $session = $this->request->session();

        //$source = 'en';
        $source = $session->read('Config.language');

        $target = $session->read('Config.language') == 'en' ? 'ar' : 'en';

        //$text = 'Simple PHP library for talking to Googles Translate API for free.';



        $trans = new GoogleTranslate();

        $result = $trans->translate($source, $target, $text);



        return $result;
    }

    public function addtowishlist() {

        $this->loadModel('Wishlist');
        $wishlist = $this->Wishlist->find('all', [
            'conditions' => ['Wishlist.trip_id' => $this->request->data['trip_id'], 'Wishlist.user_id' => $this->Auth->user('id')]
        ])->first();
        
        if(!empty($wishlist)){
            $this->Wishlist->deleteAll(['trip_id' => $this->request->data['trip_id'], 'user_id' => $this->Auth->user('id')]);
            $json['isSuccess'] = 'true';
            $json['msg'] = 'removed';
        }else{
            $this->request->data['user_id'] = $this->Auth->user('id');
            
            $wishlist = $this->Wishlist->newEntity();
            $wishlist = $this->Wishlist->patchEntity($wishlist, $this->request->data);
            
            if($this->Wishlist->save($wishlist)){
                $json['isSuccess'] = 'true';
                $json['msg'] = 'added';
            }else{
                $json['isSuccess'] = 'false';
                $json['msg'] = 'removed';
            }
        }
        
        echo json_encode($json);
        exit;
    }
    
    public function ajaxcurrencyconverter() {

        if ($this->request->is(array('post', 'put'))) {
            
            $session = $this->request->session();
                        
            $amount = 1;
            $from_Currency = $session->read('Config.currency');
            $to_Currency = $this->request->data['to_currency'];

            $from_Currency = urlencode($from_Currency);
            $to_Currency = urlencode($to_Currency);
            $get = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
            $get = explode("<span class=bld>", $get);
            $get = explode("</span>", $get[1]);
            
            if($from_Currency != $to_Currency){
                $converted_currency['amount'] = preg_replace("/[^0-9\.]/", null, $get[0]);
                $converted_currency['currency'] = $to_Currency;
            }else{
                $converted_currency['amount'] = 1;
                $converted_currency['currency'] = $to_Currency;
            }    
            
            $session->write('Config.currency', $to_Currency);
            
        }
        echo json_encode($converted_currency);
        exit;
    }
    
    
    public function ajaxtripdata(){
        if ($this->request->is(['patch', 'post', 'put'])) {
		
            switch($_GET['action']){
                case 'getAdvancePriceBypersons':
                        $this->loadModel('Tripprices');
                        $prices = $this->Tripprices->find('all', [
                                'conditions' => ['Tripprices.person' => $this->request->data['travelers'], 'Tripprices.trip_id' => $this->request->data['trip_id']]
                        ]);
                        $prices = $prices->first()->toArray();
                        echo json_encode($prices);
                break;
            }
            exit;
        }    
    }

}
