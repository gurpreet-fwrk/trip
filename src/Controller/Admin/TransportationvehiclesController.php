<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Transportationvehicles Controller
 *
 * @property \App\Model\Table\TransportationvehiclesTable $Transportationvehicles
 *
 * @method \App\Model\Entity\Transportationvehicle[] paginate($object = null, array $settings = [])
 */
class TransportationvehiclesController extends AppController
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
            'contain' => ['Transportations']
        ];
        $transportationvehicles = $this->paginate($this->Transportationvehicles);

        $this->set(compact('transportationvehicles'));
        $this->set('_serialize', ['transportationvehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Transportationvehicle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transportationvehicle = $this->Transportationvehicles->get($id, [
            'contain' => ['Transportations']
        ]);

        $this->set('transportationvehicle', $transportationvehicle);
        $this->set('_serialize', ['transportationvehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transportationvehicle = $this->Transportationvehicles->newEntity();
        if ($this->request->is('post')) {

            $post = $this->request->data;

            if($this->request->data['icon']['name'] != ''){

                $image = $this->request->data['icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/transport_vehicles/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['icon'] = $name;
            }else{
                $post['icon'] = '';
            }    

            $transportationvehicle = $this->Transportationvehicles->patchEntity($transportationvehicle, $post);
            if ($this->Transportationvehicles->save($transportationvehicle)) {
                $this->Flash->success(__('The transportationvehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportationvehicle could not be saved. Please, try again.'));
        }
        $transportations = $this->Transportationvehicles->Transportations->find('list', ['limit' => 200]);
        $this->set(compact('transportationvehicle', 'transportations'));
        $this->set('_serialize', ['transportationvehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transportationvehicle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transportationvehicle = $this->Transportationvehicles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $post = $this->request->data;

            if($this->request->data['icon']['name'] != ''){
                    
                if($transportationvehicle->icon != ''){

                    $file_path = WWW_ROOT.'images/transport_vehicles/'.$transportationvehicle->icon;

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

            $transportationvehicle = $this->Transportationvehicles->patchEntity($transportationvehicle, $post);
            if ($this->Transportationvehicles->save($transportationvehicle)) {
                $this->Flash->success(__('The transportationvehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportationvehicle could not be saved. Please, try again.'));
        }
        $transportations = $this->Transportationvehicles->Transportations->find('list', ['limit' => 200]);
        $this->set(compact('transportationvehicle', 'transportations'));
        $this->set('_serialize', ['transportationvehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transportationvehicle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transportationvehicle = $this->Transportationvehicles->get($id);
        if ($this->Transportationvehicles->delete($transportationvehicle)) {
            $this->Flash->success(__('The transportationvehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The transportationvehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
