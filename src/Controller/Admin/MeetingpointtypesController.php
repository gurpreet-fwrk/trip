<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Meetingpointtypes Controller
 *
 * @property \App\Model\Table\MeetingpointtypesTable $Meetingpointtypes
 *
 * @method \App\Model\Entity\Meetingpointtype[] paginate($object = null, array $settings = [])
 */
class MeetingpointtypesController extends AppController
{

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        if ($this->request->params['prefix'] == 'admin') {

            $this->viewBuilder()->setLayout('admin');

        }

        $this->Auth->allow();

        $this->authcontent();

    }
    
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
        $meetingpointtypes = $this->paginate($this->Meetingpointtypes);

        $this->set(compact('meetingpointtypes'));
        $this->set('_serialize', ['meetingpointtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Meetingpointtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingpointtype = $this->Meetingpointtypes->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('meetingpointtype', $meetingpointtype);
        $this->set('_serialize', ['meetingpointtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingpointtype = $this->Meetingpointtypes->newEntity();
        if ($this->request->is('post')) {
            $meetingpointtype = $this->Meetingpointtypes->patchEntity($meetingpointtype, $this->request->getData());
            if ($this->Meetingpointtypes->save($meetingpointtype)) {
                $this->Flash->success(__('The meetingpointtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meetingpointtype could not be saved. Please, try again.'));
        }
        $locations = $this->Meetingpointtypes->Locations->find('list', ['limit' => 200]);
        //$meetingpoints = $this->Meetingpointtypes->Meetingpoints->find('list', ['limit' => 200]);
        $this->set(compact('meetingpointtype', 'meetingpoints', 'locations'));
        $this->set('_serialize', ['meetingpointtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meetingpointtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingpointtype = $this->Meetingpointtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
            
            $meetingpointtype = $this->Meetingpointtypes->patchEntity($meetingpointtype, $this->request->getData());
            if ($this->Meetingpointtypes->save($meetingpointtype)) {
                $this->Flash->success(__('The meetingpointtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meetingpointtype could not be saved. Please, try again.'));
        }
        $locations = $this->Meetingpointtypes->Locations->find('list', ['limit' => 200]);
        $this->set(compact('meetingpointtype', 'locations'));
        $this->set('_serialize', ['meetingpointtype']);      
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Meetingpointtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingpointtype = $this->Meetingpointtypes->get($id);
        if ($this->Meetingpointtypes->delete($meetingpointtype)) {
            $this->Flash->success(__('The meetingpointtype has been deleted.'));
        } else {
            $this->Flash->error(__('The meetingpointtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    /****** AJAX Functions *******/
    
    public function ajaxGetMeetingpointsByLocationID(){
        
        $this->loadModel('Meetingpoints');
        
        if($this->request->is('post')){        
            $meetingpoints = $this->Meetingpoints->find('all', ['conditions' => ['Meetingpoints.location_id' => $this->request->data['location_id']]]);
            
            echo json_encode($meetingpoints);
            
            exit;
        }
        
        
        
    }
    
    /****** AJAX Functions *******/
}
