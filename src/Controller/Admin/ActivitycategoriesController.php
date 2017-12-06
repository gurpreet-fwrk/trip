<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Activitycategories Controller
 *
 * @property \App\Model\Table\ActivitycategoriesTable $Activitycategories
 *
 * @method \App\Model\Entity\Activitycategory[] paginate($object = null, array $settings = [])
 */
class ActivitycategoriesController extends AppController
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
        $activitycategories = $this->paginate($this->Activitycategories);

        $this->set(compact('activitycategories'));
        $this->set('_serialize', ['activitycategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Activitycategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activitycategory = $this->Activitycategories->get($id, [
            'contain' => []
        ]);

        $this->set('activitycategory', $activitycategory);
        $this->set('_serialize', ['activitycategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activitycategory = $this->Activitycategories->newEntity();
        if ($this->request->is('post')) {
            $activitycategory = $this->Activitycategories->patchEntity($activitycategory, $this->request->getData());
            if ($this->Activitycategories->save($activitycategory)) {
                $this->Flash->success(__('The activitycategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activitycategory could not be saved. Please, try again.'));
        }
        $this->set(compact('activitycategory'));
        $this->set('_serialize', ['activitycategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activitycategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activitycategory = $this->Activitycategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activitycategory = $this->Activitycategories->patchEntity($activitycategory, $this->request->getData());
            if ($this->Activitycategories->save($activitycategory)) {
                $this->Flash->success(__('The activitycategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activitycategory could not be saved. Please, try again.'));
        }
        $this->set(compact('activitycategory'));
        $this->set('_serialize', ['activitycategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activitycategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activitycategory = $this->Activitycategories->get($id);
        if ($this->Activitycategories->delete($activitycategory)) {
            $this->Flash->success(__('The activitycategory has been deleted.'));
        } else {
            $this->Flash->error(__('The activitycategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
