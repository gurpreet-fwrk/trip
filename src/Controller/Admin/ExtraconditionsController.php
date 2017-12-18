<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Extraconditions Controller
 *
 * @property \App\Model\Table\ExtraconditionsTable $Extraconditions
 *
 * @method \App\Model\Entity\Extracondition[] paginate($object = null, array $settings = [])
 */
class ExtraconditionsController extends AppController
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
        $extraconditions = $this->paginate($this->Extraconditions);

        $this->set(compact('extraconditions'));
        $this->set('_serialize', ['extraconditions']);
    }

    /**
     * View method
     *
     * @param string|null $id Extracondition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $extracondition = $this->Extraconditions->get($id, [
            'contain' => []
        ]);

        $this->set('extracondition', $extracondition);
        $this->set('_serialize', ['extracondition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $extracondition = $this->Extraconditions->newEntity();
        if ($this->request->is('post')) {

            $post = $this->request->data;

            if($this->request->data['icon']['name'] != ''){

                $image = $this->request->data['icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/uploads/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['icon'] = $name;
            }else{
                $post['icon'] = '';
            }  
            
            if($this->request->data['selected_icon']['name'] != ''){

                $image = $this->request->data['selected_icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/uploads/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['selected_icon'] = $name;
            }else{
                $post['selected_icon'] = '';
            }  

            $extracondition = $this->Extraconditions->patchEntity($extracondition, $post);
            if ($this->Extraconditions->save($extracondition)) {
                $this->Flash->success(__('The extracondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extracondition could not be saved. Please, try again.'));
        }
        $this->set(compact('extracondition'));
        $this->set('_serialize', ['extracondition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Extracondition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $extracondition = $this->Extraconditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $post = $this->request->data;

            if($this->request->data['icon']['name'] != ''){
                    
                if($extracondition->icon != ''){

                    $file_path = WWW_ROOT.'images/uploads/'.$extracondition->icon;

                    if(file_exists($file_path)){
                        unlink($file_path);
                    }
                }   
            
                $image = $this->request->data['icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/uploads/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['icon'] = $name;
            
            }else{
                unset($post['icon']);
                //$post = $this->request->data;
            }
            
            if($this->request->data['selected_icon']['name'] != ''){
                    
                if($extracondition->selected_icon != ''){

                    $file_path = WWW_ROOT.'images/uploads/'.$extracondition->selected_icon;

                    if(file_exists($file_path)){
                        unlink($file_path);
                    }
                }   
            
                $image = $this->request->data['selected_icon'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/uploads/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                
                $post['selected_icon'] = $name;
            
            }else{
                unset($post['selected_icon']);
                //$post = $this->request->data;
            }

            $extracondition = $this->Extraconditions->patchEntity($extracondition, $post);
            if ($this->Extraconditions->save($extracondition)) {
                $this->Flash->success(__('The extracondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extracondition could not be saved. Please, try again.'));
        }
        $this->set(compact('extracondition'));
        $this->set('_serialize', ['extracondition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Extracondition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $extracondition = $this->Extraconditions->get($id);
        if ($this->Extraconditions->delete($extracondition)) {
            $this->Flash->success(__('The extracondition has been deleted.'));
        } else {
            $this->Flash->error(__('The extracondition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
