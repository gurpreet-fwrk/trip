<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Meetingpoints Controller
 *
 * @property \App\Model\Table\MeetingpointsTable $Meetingpoints
 *
 * @method \App\Model\Entity\Meetingpoint[] paginate($object = null, array $settings = [])
 */
class MeetingpointsController extends AppController
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
            'contain' => ['Locations', 'Meetingpointtypes']
        ];
        $meetingpoints = $this->paginate($this->Meetingpoints);

        $this->set(compact('meetingpoints'));
        $this->set('_serialize', ['meetingpoints']);
    }

    /**
     * View method
     *
     * @param string|null $id Meetingpoint id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingpoint = $this->Meetingpoints->get($id, [
            'contain' => ['Locations', 'Meetingpointtypes']
        ]);

        $this->set('meetingpoint', $meetingpoint);
        $this->set('_serialize', ['meetingpoint']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingpoint = $this->Meetingpoints->newEntity();
        if ($this->request->is('post')) {
            $meetingpoint = $this->Meetingpoints->patchEntity($meetingpoint, $this->request->getData());
            if ($this->Meetingpoints->save($meetingpoint)) {
                $this->Flash->success(__('The meetingpoint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meetingpoint could not be saved. Please, try again.'));
        }
        $locations = $this->Meetingpoints->Locations->find('list', ['limit' => 200]);
        $meetingpointtypes = $this->Meetingpoints->Meetingpointtypes->find('list', ['limit' => 200]);

        $this->set(compact('meetingpoint', 'locations', 'meetingpointtypes'));
        $this->set('_serialize', ['meetingpoint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meetingpoint id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingpoint = $this->Meetingpoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingpoint = $this->Meetingpoints->patchEntity($meetingpoint, $this->request->getData());
            if ($this->Meetingpoints->save($meetingpoint)) {
                $this->Flash->success(__('The meetingpoint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meetingpoint could not be saved. Please, try again.'));
        }
        $locations = $this->Meetingpoints->Locations->find('list', ['limit' => 200]);
        $meetingpointtypes = $this->Meetingpoints->Meetingpointtypes->find('list', ['limit' => 200]);
        $this->set(compact('meetingpoint', 'locations', 'meetingpointtypes'));
        $this->set('_serialize', ['meetingpoint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meetingpoint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingpoint = $this->Meetingpoints->get($id);
        if ($this->Meetingpoints->delete($meetingpoint)) {
            $this->Flash->success(__('The meetingpoint has been deleted.'));
        } else {
            $this->Flash->error(__('The meetingpoint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getMeetingpointtypesByLocation(){

        $meeting_point_types = array();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->loadModel('Meetingpointtypes');

            $meeting_point_types = $this->Meetingpointtypes->find('all', ['conditions' => ['Meetingpointtypes.location_id' => $this->request->data['location_id']]]);

        }

        echo json_encode($meeting_point_types);
        exit;
    }

}
