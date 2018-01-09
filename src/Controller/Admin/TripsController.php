<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

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

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        if ($this->request->params['prefix'] == 'admin') {

            $this->viewBuilder()->setLayout('admin');

        }

        $this->Auth->allow(['logout', 'ajaxTrip']);

        $this->authcontent();

    }
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Tripgallery', 'Users'],
            'order'     =>  ['id' => 'DESC'],
            'conditions' => ['Trips.status !=' => 2]
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
        $this->loadModel('Triplocations');
        $this->loadModel('Tripactivities');
        $this->loadModel('Tripgallery');
        $this->loadModel('Meetingpoints');
        $this->loadModel('Meetingpointtypes');
        $this->loadModel('Tripmeetingpoints');
        $this->loadModel('Tripprices');
        $this->loadModel('Extraconditions');
        $this->loadModel('Tripextraconditions');
        
        $trip = $this->Trips->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            
            
            $session = $this->request->session();
                 
            $session->read('Config.language');
            $title = $this->language($this->request->data['title_'.$session->read('Config.language')]);
            $summary = $this->language($this->request->data['summary_'.$session->read('Config.language')]);
            $extra_expense = $this->language($this->request->data['extra_expense_'.$session->read('Config.language')]);
                
            $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';

            $this->request->data['title_'.$change_language] = $title;
            $this->request->data['summary_'.$change_language] = $summary;
            $this->request->data['extra_expense_'.$change_language] = $extra_expense;
            
            $this->request->data['schedule'] = json_encode($this->request->data['schedule']);
            
            $this->request->data['status'] = '1';
            
            $this->request->data['user_id'] = $this->Auth->user('id');
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
            if($this->request->data['pricing_type'] == 'basic'){

                $this->request->data['basic_price_per_person'] = $this->request->data['basic_single_price'];
                $this->request->data['basic_total_price'] = $this->request->data['basic_total_price1'];

            }
            
            if(isset($this->request->data['child_price_enabled'])){
                $this->request->data['child_price_enabled'] = 1;
            }else{
                $this->request->data['child_price_enabled'] = 0;
                $this->request->data['child_price_enabled'] = '0.00';
            }
            
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            
            $result = $this->Trips->save($trip);
            
            if ($result) {
                $this->Flash->success(__('Trip has been created and published successfully'));

                $id = $result->id;
                
                if($this->request->data['stopped_locations'] != ''){

                    $stopped_locations = array();

                    for($i=0; $i<count($this->request->data['stopped_locations']); $i++){                          

                        $stopped_locations['trip_id'] = $id;
                        $stopped_locations['location_id'] = $this->request->data['stopped_locations'][$i];

                        $triplocations = $this->Triplocations->newEntity();                    
                        $triplocations = $this->Triplocations->patchEntity($triplocations,$stopped_locations);            
                        $this->Triplocations->save($triplocations);
                    }
                }
                
                if($this->request->data['activities'] != ''){
                    
                    for($i=0; $i<count($this->request->data['activities']); $i++){      
                        
                        $activities['trip_id'] = $id;
                        
                        $activities['activity_id'] = $this->request->data['activities'][$i];
                        
                        $tripactivities = $this->Tripactivities->newEntity();                    
                        $tripactivities = $this->Tripactivities->patchEntity($tripactivities, $activities);            
                        $this->Tripactivities->save($tripactivities);
                    }
                }
                
                if(isset($this->request->data['images'])){
                    
                    for($i=0; $i<count($this->request->data['images']);$i++){
                        $fileName = $this->request->data['images'][$i]['name'];
                        $fileName = date('His') . $fileName;
                        $uploadPath = WWW_ROOT . '/images/trips/'.$fileName;
                        $actual_file[] = $fileName;
                        move_uploaded_file($this->request->data['images'][$i]['tmp_name'], $uploadPath);
                      
                        $this->loadModel('Tripgallery');
                        
                        $gallery['trip_id'] = $id;
                        $gallery['file']    = $fileName;
                        
                        $tripgallery = $this->Tripgallery->newEntity();                    
                        $tripgallery = $this->Tripgallery->patchEntity($tripgallery,$gallery);            
                        $this->Tripgallery->save($tripgallery);
                    } 
                }
                
                if($this->request->data['pricing_type'] == 'advance'){
                    
                    $this->request->data['basic_price_per_person'] = '';
                    $this->request->data['basic_total_price'] = '';
                    
                    $prices = $this->request->data['apricing'];
                    
                    foreach($prices as $price){
                        
                        $data['trip_id'] = $id;
                        $data['person'] = $price['persons'];
                        $data['price_per_person'] = $price['single'];
                        $data['total_price'] = $price['total_price'];
                        
                        $tripprices = $this->Tripprices->newEntity();
                        $tripprices = $this->Tripprices->patchEntity($tripprices, $data);
                        $this->Tripprices->save($tripprices);
                    }
                }
                
                if(isset($this->request->data['extracondition_id'])){
                    
                    $extraconditions = $this->request->data['extracondition_id'];
                    
                    $conditions = array();
                    
                    foreach($extraconditions as $extracondition){
                        
                        $conditions['trip_id'] = $id;
                        $conditions['extracondition_id'] = $extracondition;
                        
                        $tripextraconditions = $this->Tripextraconditions->newEntity();
                        $tripextraconditions = $this->Tripextraconditions->patchEntity($tripextraconditions, $conditions);
                        $this->Tripextraconditions->save($tripextraconditions);
                    }
                     
                }
                
                if($this->request->data['meetingpoints'] != 'undefined' || $this->request->data['meetingpoints'] != ''){

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

                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The trip could not be saved. Please try again.'));
            }
        }
        
        $locations = $this->Trips->Locations->find('list', ['limit' => 200]);
        $activities = $this->Trips->Activities->find('list', ['limit' => 200]);
        
        /**************************/
        
        $this->loadModel('Transportations');

        $transportations = $this->Transportations->find('all', [
            'contain' => ['Transportationvehicles']
        ]);

        $transportations = $transportations->all()->toArray();
        
		$selected_meetingpoints = array();
		
        /**********************/
                
        $extraconditions = $this->Extraconditions->find('all', [
            'contain' => []
        ]);

        $extraconditions = $extraconditions->all()->toArray();
        
        $this->set(compact('trip', 'locations', 'activities', 'transportations', 'selected_meetingpoints', 'extraconditions'));
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
            
            
            
            $session = $this->request->session();
                 
            $session->read('Config.language');
            $title = $this->language($this->request->data['title_'.$session->read('Config.language')]);
            $summary = $this->language($this->request->data['summary_'.$session->read('Config.language')]);
            $extra_expense = $this->language($this->request->data['extra_expense_'.$session->read('Config.language')]);
                
            $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';

            $this->request->data['title_'.$change_language] = $title;
            $this->request->data['summary_'.$change_language] = $summary;
            $this->request->data['extra_expense_'.$change_language] = $extra_expense;
            
            $this->request->data['schedule'] = json_encode($this->request->data['schedule']);
            
            $this->request->data['status'] = '1';
            
            //echo "<pre>"; print_r($this->request->data); echo "</pre>";
            
            //exit;
            if($this->request->data['pricing_type'] == 'basic'){

                $this->request->data['basic_price_per_person'] = $this->request->data['basic_single_price'];
                $this->request->data['basic_total_price'] = $this->request->data['basic_total_price1'];

            }
            
            if(isset($this->request->data['child_price_enabled'])){
                $this->request->data['child_price_enabled'] = 1;
            }else{
                $this->request->data['child_price_enabled'] = 0;
                $this->request->data['child_price_enabled'] = '0.00';
            }
            
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
            
            if ($this->Trips->save($trip)) {
                
                $this->Flash->success(__('Trip has been created and published successfully'));

                if($this->request->data['stopped_locations'] != ''){
                    
                    $this->Triplocations->deleteAll(['trip_id' => $id]);
                    
                    $stopped_locations = array();

                    for($i=0; $i<count($this->request->data['stopped_locations']); $i++){                          

                        $stopped_locations['trip_id'] = $id;
                        $stopped_locations['location_id'] = $this->request->data['stopped_locations'][$i];

                        $triplocations = $this->Triplocations->newEntity();                    
                        $triplocations = $this->Triplocations->patchEntity($triplocations,$stopped_locations);            
                        $this->Triplocations->save($triplocations);
                    }
                }
                
                if($this->request->data['activities'] != ''){
                       
                    $this->Tripactivities->deleteAll(['trip_id' => $id]);
                    
                    for($i=0; $i<count($this->request->data['activities']); $i++){      
                        
                        $activities['trip_id'] = $id;
                        
                        $activities['activity_id'] = $this->request->data['activities'][$i];
                        
                        $tripactivities = $this->Tripactivities->newEntity();                    
                        $tripactivities = $this->Tripactivities->patchEntity($tripactivities, $activities);            
                        $this->Tripactivities->save($tripactivities);
                    }
                }
                
                if($this->request->data['images'][0]['name'] != ''){
                    
                    $all_images = $this->Tripgallery->find('all', [
                        'conditions' => ['Tripgallery.trip_id' => $id] 
                    ])->all()->toArray();

                    foreach($all_images as $img){
                        $file = WWW_ROOT . '/images/trips/'.$img['file'];
                        if(file_exists($file)){
                            unlink($file);
                        }
                    }
                    
                    $this->Tripgallery->deleteAll(['trip_id' => $id]);
                    
                    for($i=0; $i<count($this->request->data['images']);$i++){
                        $fileName = $this->request->data['images'][$i]['name'];
                        $fileName = date('His') . $fileName;
                        $uploadPath = WWW_ROOT . '/images/trips/'.$fileName;
                        $actual_file[] = $fileName;
                        move_uploaded_file($this->request->data['images'][$i]['tmp_name'], $uploadPath);
                      
                        $this->loadModel('Tripgallery');
                        
                        $gallery['trip_id'] = $id;
                        $gallery['file']    = $fileName;
                        
                        $tripgallery = $this->Tripgallery->newEntity();                    
                        $tripgallery = $this->Tripgallery->patchEntity($tripgallery,$gallery);            
                        $this->Tripgallery->save($tripgallery);
                    } 
                }
                
                if($this->request->data['pricing_type'] == 'advance'){
                    
                    $this->Tripprices->deleteAll(['trip_id' => $id]);
                    
                    $this->request->data['basic_price_per_person'] = '';
                    $this->request->data['basic_total_price'] = '';
                    
                    $prices = $this->request->data['apricing'];
                    
                    foreach($prices as $price){
                        
                        $data['trip_id'] = $id;
                        $data['person'] = $price['persons'];
                        $data['price_per_person'] = $price['single'];
                        $data['total_price'] = $price['total_price'];
                        
                        $tripprices = $this->Tripprices->newEntity();
                        $tripprices = $this->Tripprices->patchEntity($tripprices, $data);
                        $this->Tripprices->save($tripprices);
                    }
                }
                
                if(isset($this->request->data['extracondition_id'])){
                    
                    $this->Tripextraconditions->deleteAll(['trip_id' => $id]);
                    
                    $extraconditions = $this->request->data['extracondition_id'];
                    
                    $conditions = array();
                    
                    foreach($extraconditions as $extracondition){
                        
                        $conditions['trip_id'] = $id;
                        $conditions['extracondition_id'] = $extracondition;
                        
                        $tripextraconditions = $this->Tripextraconditions->newEntity();
                        $tripextraconditions = $this->Tripextraconditions->patchEntity($tripextraconditions, $conditions);
                        $this->Tripextraconditions->save($tripextraconditions);
                    }
                     
                }
                
                if($this->request->data['meetingpoints'] != ''){

                    $meeting_points = json_decode($this->request->data['meetingpoints']);
                    
                    $this->Tripmeetingpoints->deleteAll(['trip_id' => $id]);
                    
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

                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The trip could not be saved. Please try again.'));
            }
        }
        
        $locations = $this->Trips->Locations->find('list', ['limit' => 200]);
        //$transportations = $this->Trips->Transportations->find('list', ['limit' => 200]);
        $meetingpoints = $this->Trips->Meetingpoints->find('list', ['limit' => 200]);
        $meetingpointtypes = $this->Trips->Meetingpointtypes->find('list', ['limit' => 200]);
        $tripfeatures = $this->Trips->Tripfeatures->find('list', ['limit' => 200]);
        $extraconditions = $this->Trips->Extraconditions->find('list', ['limit' => 200]);
        
        $activities = $this->Trips->Activities->find('list', ['limit' => 200]);
        
        /**************************/
        
        $this->loadModel('Transportations');

        $transportations = $this->Transportations->find('all', [
            'contain' => ['Transportationvehicles']
        ]);

        $transportations = $transportations->all()->toArray();
        
        /**********************/
        
        $extraconditions = $this->Extraconditions->find('all', [
            'contain' => []
        ]);

        $extraconditions = $extraconditions->all()->toArray();
        
        
        
        /************************/
        
        $this->loadModel('Triplocations');
        
        $selected_stopped_location = $this->Triplocations->find('all', [
            'contain' => ['Locations'],
            'conditions' => ['Triplocations.trip_id' => $id]
        ])->all()->toArray(); 
        $this->set('selected_stopped_location', $selected_stopped_location);
        
        
        /************************/
        
        
        $selected_extraconditions = $this->Tripextraconditions->find('all', [
            'contain' => [],
            'conditions' => ['Tripextraconditions.trip_id' => $id]
        ])->all()->toArray(); 
        $this->set('selected_extraconditions', $selected_extraconditions);
        
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
        
        $selected_tripprices = $this->Tripprices->find('all', ['conditions' => ['Tripprices.trip_id' => $id]])->all()->toArray();
        $this->set('selected_tripprices', $selected_tripprices);
        
        /***********************/
        
        $galleries = $this->Tripgallery->find('all', ['conditions' => ['Tripgallery.trip_id' => $id]])->all()->toArray(); 
        $this->set('galleries', $galleries);
        
        /************************/
        
        $this->set(compact('trip', 'locations', 'transportations', 'meetingpoints', 'meetingpointtypes', 'tripfeatures', 'extraconditions', 'activities', 'tripgallery', 'extraconditions'));
        $this->set('_serialize', ['trip']);
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
        $this->loadModel('Triplocations');
        $this->loadModel('Tripactivities');
        $this->loadModel('Tripgallery');;
        $this->loadModel('Tripmeetingpoints');
        $this->loadModel('Tripprices');
        $this->loadModel('Tripextraconditions');
        
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            
            $this->Triplocations->deleteAll(['trip_id' => $id]);
            $this->Tripactivities->deleteAll(['trip_id' => $id]);
            $this->Tripgallery->deleteAll(['trip_id' => $id]);
            $this->Tripprices->deleteAll(['trip_id' => $id]);
            $this->Tripextraconditions->deleteAll(['trip_id' => $id]);
            $this->Tripmeetingpoints->deleteAll(['trip_id' => $id]);
            
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function ajaxTrip(){
		if ($this->request->is(['patch', 'post', 'put'])) {
		
			switch($_GET['action']){
				case 'getLocationsById':
					$this->loadModel('Locations');
					$locations = $this->Locations->find('all', [
						'conditions' => ['Locations.id IN' => json_decode($this->request->data['location_ids'])]
					]);
					$locations = $locations->all()->toArray();
					echo json_encode($locations);
					
					
				break;
				
				case 'get_meeting_points_types':
					$this->loadModel('Meetingpointtypes');
					$meeting_point_points = $this->Meetingpointtypes->find('all', [
						'conditions' => ['Meetingpointtypes.location_id' => $this->request->data['location_id']]
					])->all()->toArray(); 
					
					echo json_encode($meeting_point_points);
				break;
				
				case 'get_meeting_points':
					$this->loadModel('Meetingpoints');
					$meeting_points = $this->Meetingpoints->find('all', [
						'conditions' => ['Meetingpoints.meetingpointtype_id' => $this->request->data['meetingpointtype_id']]
					])->all()->toArray(); 
					
					echo json_encode($meeting_points);
				break;	
                            
                                case 'change_status':
                                    
                                    $status = $this->request->data['status'];
                                    $id = $this->request->data['id'];
                                    
                                    
                                    $this->Trips->updateAll(array('status' => $status), array('id' => $id));
                                    echo 'success';
                                    
                                break; 
                            
			}
		
			exit;
		} 
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
        
}
