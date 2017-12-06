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
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
            $this->request->data['trip_id'] = $id;
            
            if($this->request->data['tab'] == 'basic'){
                
                
                
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
            
            if($this->request->data['tab'] == 'overview'){
                
                 $session = $this->request->session();

                 echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
                 
                $session->read('Config.language');
                $title = $this->language($this->request->data['title_'.$session->read('Config.language')]);
                $summary = $this->language($this->request->data['summary_'.$session->read('Config.language')]);
                
                $change_language = $session->read('Config.language') == 'en' ? 'ar' : 'en';
                
                $this->request->data['title_'.$change_language] = $title;
                $this->request->data['summary_'.$change_language] = $summary;
                
                if($this->request->data['images'][0]['name'] != ''){
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
        
        $this->set(compact('trip', 'locations', 'transportations', 'meetingpoints', 'meetingpointtypes', 'tripfeatures', 'extraconditions', 'activities'));
        $this->set('_serialize', ['trip']);
        
        /***************/
        
        $this->loadModel('Triplocations');
        
        $selected_stopped_location = $this->Triplocations->find('all', ['conditions' => ['Triplocations.trip_id' => $id], 'fields' => 'location_id'])->all()->toArray(); 
        $this->set('selected_stopped_location', $selected_stopped_location);
        
        $selected_activities = $this->Tripactivities->find('all', ['conditions' => ['Tripactivities.trip_id' => $id]])->all()->toArray(); 
        $this->set('selected_activities', $selected_activities);
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
}
