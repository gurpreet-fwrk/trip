<?php
namespace App\Controller;

use App\Controller\AppController;

use \Statickidz\GoogleTranslate;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 *
 * @method \App\Model\Entity\Trip[] paginate($object = null, array $settings = [])
 */
class TripsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
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
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Locations', 'Transportations', 'Meetingpoints', 'Meetingpointtypes', 'Tripfeatures', 'Extraconditions', 'Tripactivities', 'Triplocations', 'Tripprices']
        ]);

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        
        $trip = $this->Trips->newEntity();
        //if ($this->request->is('post')) {
            
            $user_id = $this->Auth->user('id');
            $data= array();
            $data['user_id'] = $user_id;
         
        
            $trip = $this->Trips->patchEntity($trip,$data);
     
            
            $add_trip = $this->Trips->save($trip);
            
            if ($add_trip) {
                //$this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'edit', base64_encode($add_trip->id)]);
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
    public function edit($id = null)
    {
        
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
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
            $this->request->data['trip_id'] = $id;
            
            /***** Tab BASIC ******/
            
            if($this->request->data['tab'] == 'basic'){
                
                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
                
                if($this->request->data['stopped_locations'] != ''){
                    
                    $this->Triplocations->deleteAll(['trip_id' => $id]);
                    
                    $post = array();
                    
                    for($i=0; $i<count($this->request->data['stopped_locations']); $i++){                          
                        
                        $post['trip_id'] = $id;
                        $post['location_id'] = $this->request->data['stopped_locations'][$i];
                        
                        $triplocations = $this->Triplocations->newEntity();                    
                        $triplocations = $this->Triplocations->patchEntity($triplocations,$post);            
                        $this->Triplocations->save($triplocations);
                    }
                }    
                
                if($this->request->data['activities'] != ''){
                    
                    $this->Tripactivities->deleteAll(['trip_id' => $id]);
                    
                    for($i=0; $i<count($this->request->data['activities']); $i++){      
                        
                        $this->request->data['activity_id'] = $this->request->data['activities'][$i];
                        
                        $tripactivities = $this->Tripactivities->newEntity();                    
                        $tripactivities = $this->Tripactivities->patchEntity($tripactivities,$this->request->data);            
                        $this->Tripactivities->save($tripactivities);
                    }
                }    
            }
            
            /***** Tab BASIC (END) ******/
            
            /***** Tab OVERVIEW ******/
            
            if($this->request->data['tab'] == 'overview'){
                
                $session = $this->request->session();
                 
                $session->read('Config.language');
                $title = $this->language($this->request->data['title_'.$session->read('Config.language')]);
                $summary = $this->language($this->request->data['summary_'.$session->read('Config.language')]);
                
                $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';
                
                $this->request->data['title_'.$change_language] = $title;
                $this->request->data['summary_'.$change_language] = $summary;
                
                if(isset($this->request->data['images'])){
                    for($i=0; $i<count($this->request->data['images']);$i++){
                        $fileName = $this->request->data['images'][$i]['name'];
                        $fileName = date('His') . $fileName;
                        $uploadPath = WWW_ROOT . '/images/trips/'.$fileName;
                        $actual_file[] = $fileName;
                        move_uploaded_file($this->request->data['images'][$i]['tmp_name'], $uploadPath);
                      
                        $this->loadModel('Tripgallery');
                        
                        $post['trip_id'] = $id;
                        $post['file']    = $fileName;
                        
                        $tripgallery = $this->Tripgallery->newEntity();                    
                        $tripgallery = $this->Tripgallery->patchEntity($tripgallery,$post);            
                        $this->Tripgallery->save($tripgallery);
                    } 
                }
            }
            
            /***** Tab OVERVIEW (END) ******/
            
            /***** REMOVE GALLERY IMAGES ******/
            
            if($this->request->data['tab'] == 'remove_gallery_image'){
                
                if($this->Tripgallery->deleteAll(['id' => $this->request->data['id']])){
                    echo 'success';
                }else{
                    echo 'error';
                }
                exit;
                
            }
            
            /***** REMOVE GALLERY IMAGES (END) ******/
            
            /******* AJAX (Get Meeting points from Location ID) ********/
            
            if($this->request->data['tab'] == 'get_meeting_points'){
                
                $meeting_points = $this->Meetingpoints->find('all', [
                    'conditions' => ['Meetingpoints.meetingpointtype_id' => $this->request->data['meetingpointtype_id']]
                ])->all()->toArray(); 
                
                echo json_encode($meeting_points);
                exit;
            }    
            
            /******* AJAX (Get Meeting points from Location ID) (END) ********/
            
            /******* AJAX (Get Meeting point Types from Location ID) ********/
            
            if($this->request->data['tab'] == 'get_meeting_points_types'){
                
                $meeting_point_points = $this->Meetingpointtypes->find('all', [
                    'conditions' => ['Meetingpointtypes.location_id' => $this->request->data['location_id']]
                ])->all()->toArray(); 
                
                echo json_encode($meeting_point_points);
                exit;
            }    
            
            /******* AJAX (Get Meeting points Types from Location ID) (END) ********/
            
            /***** Tab DETAIL ******/
            
            if($this->request->data['tab'] == 'detail'){

                
                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
                
                $this->request->data['schedule'] = json_encode($this->request->data['schedule']);
                    
                if($this->request->data['meetingpoints'] != 'undefined'){
                    
                    $this->Tripmeetingpoints->deleteAll(['trip_id' => $id]);

                    $meeting_points = json_decode($this->request->data['meetingpoints']);

                    foreach($meeting_points as $meeting_point){    
                        if($meeting_point != null){
                            $post = array();
                            $post['trip_id'] = $id;
                            $post['location'] = $meeting_point->location;
                            $post['meeting_point_type'] = $meeting_point->mt;
                            $post['meeting_point'] = $meeting_point->mp;
                            $post['meetingpoint_id'] = $meeting_point->mp_id;

                            $location = $meeting_point->location." ".$meeting_point->mt." ".$meeting_point->mp;
                            $location = str_replace(' ', '+', $location);
                            $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&address=".$location."&sensor=true";
                            $details=file_get_contents($url);
                            $result = json_decode($details,true);

                            if(!empty($result['results'])){
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
            
            /***** Tab DETAIL (ENd) ******/
            
            
            /***** Tab PRICE ******/
            
            if($this->request->data['tab'] == 'price'){
                
                //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
                
                $post = array();
                
                if($this->request->data['pricing_type'] == 'basic'){
                    
                    $this->Tripprices->deleteAll(['trip_id' => $id]);
                    
                    $this->request->data['basic_price_per_person'] = $this->request->data['basic_single_price'];
                    $this->request->data['basic_total_price'] = $this->request->data['basic_total_price1'];
                    
                }
                
                if($this->request->data['pricing_type'] == 'advance'){
                    
                    $this->Tripprices->deleteAll(['trip_id' => $id]);
                    
                    $prices = $this->request->data['apricing'];
                    
                    foreach($prices as $price){
                        
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
                $extra_expense = $this->language($this->request->data['extra_expense_'.$session->read('Config.language')]);
                
                $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';
                
                $this->request->data['extra_expense_'.$change_language] = $extra_expense;
                
                if(isset($this->request->data['child_price_enabled'])){
                    $this->request->data['child_price_enabled'] = 1;
                }else{
                    $this->request->data['child_price_enabled'] = 0;
                    $this->request->data['child_price_enabled'] = '0.00';
                }
                
            }
            
            /***** Tab PRICE (ENd) ******/
            
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        
        
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
        
        $this->set(compact('trip', 'locations', 'transportations', 'meetingpoints', 'meetingpointtypes', 'tripfeatures', 'extraconditions', 'activities', 'tripgallery'));
        $this->set('_serialize', ['trip']);
        
        /************************/
        
        $this->loadModel('Triplocations');
        
        $selected_stopped_location = $this->Triplocations->find('all', [
            'contain' => ['Locations'],
            'conditions' => ['Triplocations.trip_id' => $id]
        ])->all()->toArray(); 
        $this->set('selected_stopped_location', $selected_stopped_location);
        
        /************************/
                
        $selected_activities = $this->Tripactivities->find('all', ['conditions' => ['Tripactivities.trip_id' => $id]])->all()->toArray(); 
        $this->set('selected_activities', $selected_activities);
        
        /************************/
        
        $galleries = $this->Tripgallery->find('all', ['conditions' => ['Tripgallery.trip_id' => $id]])->all()->toArray(); 
        $this->set('galleries', $galleries);
        
        /************************/
        
        $selected_meetingpoints = $this->Tripmeetingpoints->find('all', ['conditions' => ['Tripmeetingpoints.trip_id' => $id]])->all()->toArray();
        $this->set('selected_meetingpoints', $selected_meetingpoints);
        
        /************************/
        
        $selected_tripprices = $this->Tripprices->find('all', ['conditions' => ['Tripprices.trip_id' => $id]])->all()->toArray();
        $this->set('selected_tripprices', $selected_tripprices);
        
        /***********************/
        
        $this->set('trip_id', $id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function language($text){

                $session = $this->request->session();
        
		//$source = 'en';
                $source = $session->read('Config.language');

		$target = $session->read('Config.language') == 'en' ? 'ar' : 'en';

		//$text = 'Simple PHP library for talking to Googles Translate API for free.';

		

		$trans = new GoogleTranslate();

		$result = $trans->translate($source, $target, $text);

		

		return $result;

	}
        
        public function addoverview(){
            echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
        }
}
