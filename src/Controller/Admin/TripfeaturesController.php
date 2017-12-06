<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Tripfeatures Controller
 *
 * @property \App\Model\Table\TripfeaturesTable $Tripfeatures
 *
 * @method \App\Model\Entity\Tripfeature[] paginate($object = null, array $settings = [])
 */
class TripfeaturesController extends AppController
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

        $this->Auth->allow(['logout']);

        $this->authcontent();

    }
    
    public function index()
    {
        $tripfeatures = $this->paginate($this->Tripfeatures);

        $this->set(compact('tripfeatures'));
        $this->set('_serialize', ['tripfeatures']);
    }

    /**
     * View method
     *
     * @param string|null $id Tripfeature id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tripfeature = $this->Tripfeatures->get($id, [
            'contain' => []
        ]);

        $this->set('tripfeature', $tripfeature);
        $this->set('_serialize', ['tripfeature']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tripfeature = $this->Tripfeatures->newEntity();
        if ($this->request->is('post')) {
            $tripfeature = $this->Tripfeatures->patchEntity($tripfeature, $this->request->getData());
            if ($this->Tripfeatures->save($tripfeature)) {
                $this->Flash->success(__('The tripfeature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tripfeature could not be saved. Please, try again.'));
        }
        $this->set(compact('tripfeature'));
        $this->set('_serialize', ['tripfeature']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tripfeature id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tripfeature = $this->Tripfeatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tripfeature = $this->Tripfeatures->patchEntity($tripfeature, $this->request->getData());
            if ($this->Tripfeatures->save($tripfeature)) {
                $this->Flash->success(__('The tripfeature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tripfeature could not be saved. Please, try again.'));
        }
        $this->set(compact('tripfeature'));
        $this->set('_serialize', ['tripfeature']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tripfeature id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tripfeature = $this->Tripfeatures->get($id);
        if ($this->Tripfeatures->delete($tripfeature)) {
            $this->Flash->success(__('The tripfeature has been deleted.'));
        } else {
            $this->Flash->error(__('The tripfeature could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
