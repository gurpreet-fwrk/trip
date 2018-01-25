<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

class OrdersController extends AppController {

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        $this->Auth->allow(['create']);

        $this->authcontent();
    }

    public function index() {
        
    }

    public function create() {

        $this->loadModel('Trips');

        $trip = $this->Trips->get($_GET['trip_id'], [
                    'contain' => [
                        'Users'
                    ]
                ])->toArray();

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);

        /*         * ********** */

        $this->loadModel('Availabilities');
        $availabilities = $this->Availabilities->find('all', [
                    'conditions' => ['Availabilities.user_id' => $trip['user']['id']]
                ])->all()->toArray();

        $this->set('availabilities', $availabilities);
        $this->set('_serialize', ['availabilities']);
    }
    
    public function chat($trip_id = null, $sender = null, $reciever = null){
        
        if(!$trip_id){
            $this->redirect('/');
        }
        
        if(!$sender){
            $this->redirect('/');
        }
        
        if(!$reciever){
            $this->redirect('/');
        }
        
        $this->loadModel('Chat');
        
        $chat = $this->Chat->newEntity();
        
        if($this->request->is('post')){
            
            $this->request->data['trip_id'] = $trip_id;
            $this->request->data['sender'] = $sender;
            $this->request->data['reciever'] = $reciever;
            
            $chat = $this->Chat->patchEntity($chat, $this->request->data);
            if($this->Chat->save($chat)){
                return $this->redirect(['action' => 'chat', $trip_id, $sender, $reciever]);
            }

        }
        
        $chatdata = $this->Chat->find('all', [
           'contain'    =>  ['Trips', 'Sender_user', 'Reciever_user'],
           'conditions' =>  ['Chat.trip_id' => $trip_id, 'OR' => ['Chat.sender' => $this->Auth->user('id'), 'Chat.reciever' => $this->Auth->user('id')]],
           'order'      =>  ['Chat.id' => 'desc']
        ])->all()->toArray();
        
        $this->set('chatdata', $chatdata);
        $this->set('_serialize', ['chatdata']);
        
        $this->set('trip_id', $trip_id);
        
    }
    
    
    public function ajaxChangeChatReadStatus(){
        $this->loadModel('Chat');
        if($this->request->is('post')){
            $trip_id = $this->request->data['trip_id'];
            $this->Chat->updateAll(['read_status' => '1'],['trip_id' => $trip_id, 'reciever' => $this->Auth->user('id')]);
        }
    }

}

?>