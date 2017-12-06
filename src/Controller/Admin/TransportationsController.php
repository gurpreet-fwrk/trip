<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Transportations Controller
 *
 * @property \App\Model\Table\TransportationsTable $Transportations
 *
 * @method \App\Model\Entity\Transportation[] paginate($object = null, array $settings = [])
 */
class TransportationsController extends AppController
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
        $transportations = $this->paginate($this->Transportations);

        $this->set(compact('transportations'));
        $this->set('_serialize', ['transportations']);
    }

    /**
     * View method
     *
     * @param string|null $id Transportation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transportation = $this->Transportations->get($id, [
            'contain' => []
        ]);

        $this->set('transportation', $transportation);
        $this->set('_serialize', ['transportation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transportation = $this->Transportations->newEntity();
        if ($this->request->is('post')) {

            $post = $this->request->data;

            $image = $this->request->data['icon'];
            $name = time().$image['name'];
            $tmp_name = $image['tmp_name'];
            $upload_path = WWW_ROOT.'images/transport_vehicles/'.$name;
            move_uploaded_file($tmp_name, $upload_path);
            
            $post['icon'] = $name;

            $transportation = $this->Transportations->patchEntity($transportation, $post);
            if ($this->Transportations->save($transportation)) {
                $this->Flash->success(__('The transportation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportation could not be saved. Please, try again.'));
        }
        $this->set(compact('transportation'));
        $this->set('_serialize', ['transportation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transportation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transportation = $this->Transportations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $post = $this->request->data;

            if($this->request->data['icon']['name'] != ''){
                    
                if($transportation->icon != ''){

                    $file_path = WWW_ROOT.'images/transport_vehicles/'.$transportation->icon;

                    if(file_exists($file_path)){
                        unlink($file_path);
                    }
                }   
            
                $image = $this->request->data['icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/transport_vehicles/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['icon'] = $name;
            
            }else{
                unset($this->request->data['icon']);
                $post = $this->request->data;
            }

            $transportation = $this->Transportations->patchEntity($transportation, $post);
            if ($this->Transportations->save($transportation)) {
                $this->Flash->success(__('The transportation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportation could not be saved. Please, try again.'));
        }
        $this->set(compact('transportation'));
        $this->set('_serialize', ['transportation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transportation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transportation = $this->Transportations->get($id);
        if ($this->Transportations->delete($transportation)) {
            $this->Flash->success(__('The transportation has been deleted.'));
        } else {
            $this->Flash->error(__('The transportation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
