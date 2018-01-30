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
             
        $session = $this->request->session();
        $session->write('Trip.cart', $_GET);
        
        /***********************/
        
        $trip = $this->Trips->get($_GET['trip_id'], [
                    'contain' => [
                        'Users', 'Tripprices'
                    ]
                ])->toArray();

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);

        /************ */

        $this->loadModel('Availabilities');
        $availabilities = $this->Availabilities->find('all', [
                    'conditions' => ['Availabilities.user_id' => $trip['user']['id']]
                ])->all()->toArray();

        $this->set('availabilities', $availabilities);
        $this->set('_serialize', ['availabilities']);
        
        
        /**********************/
        
        $this->loadModel('Tripmeetingpoints');
        
        $tripmeetingpoints = $this->Tripmeetingpoints->find('all', [
           'contain'    =>  ['Trips'],
           'conditions' =>  ['Tripmeetingpoints.trip_id' => $_GET['trip_id']],
           'order'      =>  ['Tripmeetingpoints.id' => 'desc']
        ])->all()->toArray();
        
        $this->set('tripmeetingpoints', $tripmeetingpoints);
        $this->set('_serialize', ['tripmeetingpoints']);
        
        /**********************/
        
        $this->loadModel('Users');
        
        $userdata = $this->Users->find('all', [
           'contain'    =>  [],
           'conditions' =>  ['Users.id' => $this->Auth->user('id')]
        ])->first()->toArray();
        
        $this->set('userdata', $userdata);
        $this->set('_serialize', ['userdata']);

        /**********************/

        $this->loadModel('Countries');
        $countries = $this->Countries->find()->toArray();
        $this->set(compact('countries'));
        $this->set('_serialize', ['countries']);
        
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
        $this->loadModel('Trips');
        
        $chat = $this->Chat->newEntity();
        
        if($this->request->is('post')){

            echo "<pre>"; print_r($this->request->data); echo "</pre>";
            exit; 
            
            $this->request->data['trip_id'] = $trip_id;
            $this->request->data['sender'] = $sender;
            $this->request->data['reciever'] = $reciever;
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit;
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
        
        /**********************/
        
        $tripdata = $this->Chat->find('all', [
           'contain'    =>  ['Trips' => ['Users', 'Tripprices'], 'Sender_user', 'Reciever_user'],
           'conditions' =>  ['Chat.trip_id' => $trip_id, 'OR' => ['Chat.sender' => $this->Auth->user('id'), 'Chat.reciever' => $this->Auth->user('id')]],
           'order'      =>  ['Chat.id' => 'asc']
        ])->first()->toArray();
        
        $this->set('tripdata', $tripdata);
        $this->set('_serialize', ['tripdata']);
        
        /*******************/
        
        $trip = $this->Trips->get($trip_id, [
            'contain' => [
                'Users'
            ]
        ])->toArray();
        
        
        $this->loadModel('Availabilities');
        $availabilities = $this->Availabilities->find('all', [
                    'conditions' => ['Availabilities.user_id' => $trip['user']['id']]
                ])->all()->toArray();

        $this->set('availabilities', $availabilities);
        $this->set('_serialize', ['availabilities']);
        
        /**********************/
        
        $this->loadModel('Tripmeetingpoints');
        
        $tripmeetingpoints = $this->Tripmeetingpoints->find('all', [
           'contain'    =>  ['Trips'],
           'conditions' =>  ['Tripmeetingpoints.trip_id' => $trip_id],
           'order'      =>  ['Tripmeetingpoints.id' => 'desc']
        ])->all()->toArray();
        
        $this->set('tripmeetingpoints', $tripmeetingpoints);
        $this->set('_serialize', ['tripmeetingpoints']);
        
        /**************/
        
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