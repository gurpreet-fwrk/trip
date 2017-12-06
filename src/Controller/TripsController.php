<?php
namespace App\Controller;

use App\Controller\AppController;

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
                    
                    $post = array();
                    
                    for($i=0; $i<count($this->request->data['stopped_locations']); $i++){  
                        
                        $this->Triplocations->deleteAll(['trip_id' => $id]);
                        
                        $post['trip_id'] = $id;
                        $post['location_id'] = $this->request->data['stopped_locations'][$i];
                        
                        $triplocations = $this->Triplocations->newEntity();                    
                        $triplocations = $this->Triplocations->patchEntity($triplocations,$post);            
                        $this->Triplocations->save($triplocations);
                    }
                }    
                
                if($this->request->data['activities'] != ''){
                    for($i=0; $i<count($this->request->data['activities']); $i++){
                        
                        $this->Tripactivities->deleteAll(['trip_id' => $id]);
                        
                        $this->request->data['activity_id'] = $this->request->data['activities'][$i];
                        
                        $tripactivities = $this->Tripactivities->newEntity();                    
                        $tripactivities = $this->Tripactivities->patchEntity($tripactivities,$this->request->data);            
                        $this->Tripactivities->save($tripactivities);
                    }
                }    
            }
            
            
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
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
}