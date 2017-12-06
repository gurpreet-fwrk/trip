<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Priceconditions Controller
 *
 * @property \App\Model\Table\PriceconditionsTable $Priceconditions
 *
 * @method \App\Model\Entity\Pricecondition[] paginate($object = null, array $settings = [])
 */
class PriceconditionsController extends AppController
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
        $priceconditions = $this->paginate($this->Priceconditions);

        $this->set(compact('priceconditions'));
        $this->set('_serialize', ['priceconditions']);
    }

    /**
     * View method
     *
     * @param string|null $id Pricecondition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pricecondition = $this->Priceconditions->get($id, [
            'contain' => []
        ]);

        $this->set('pricecondition', $pricecondition);
        $this->set('_serialize', ['pricecondition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pricecondition = $this->Priceconditions->newEntity();
        if ($this->request->is('post')) {
            $pricecondition = $this->Priceconditions->patchEntity($pricecondition, $this->request->getData());
            if ($this->Priceconditions->save($pricecondition)) {
                $this->Flash->success(__('The pricecondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pricecondition could not be saved. Please, try again.'));
        }
        $this->set(compact('pricecondition'));
        $this->set('_serialize', ['pricecondition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pricecondition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pricecondition = $this->Priceconditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pricecondition = $this->Priceconditions->patchEntity($pricecondition, $this->request->getData());
            if ($this->Priceconditions->save($pricecondition)) {
                $this->Flash->success(__('The pricecondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pricecondition could not be saved. Please, try again.'));
        }
        $this->set(compact('pricecondition'));
        $this->set('_serialize', ['pricecondition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pricecondition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pricecondition = $this->Priceconditions->get($id);
        if ($this->Priceconditions->delete($pricecondition)) {
            $this->Flash->success(__('The pricecondition has been deleted.'));
        } else {
            $this->Flash->error(__('The pricecondition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
