<?php

namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Mailer\Email;


class OrdersController extends AppController {

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        $this->Auth->allow(['create', 'ipn']);

        $this->authcontent();
    }

    public function index() {
        
        if(!$this->Auth->user('id')){
            $this->redirect('/');
        }
        
        $orders = $this->Orders->find('all', [
           'contain'    =>  ['Trips' => ['Users', 'Locations'], 'Users'],
           'conditions' =>  ['Orders.user_id' => $this->Auth->user('id'), 'Orders.status' => 1],
           'order'      =>  ['Orders.id' => 'desc']
        ])->all()->toArray();
        
        $this->set('orders', $orders);
        $this->set('_serialize', ['orders']);
        
    }

    public function create() {
        
        if(!$this->Auth->user('id')){
            $this->redirect('/');
        }

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
        
        
        /********************/
        
        if(isset($this->request->data['order_type'])){
            $order_type = 'update';
        }else{
            $order_type = 'new';
        }
        
        $this->set('order_type', $order_type);
        $this->set('_serialize', ['order_type']);
        
    }
    
    public function chat($trip_id = null, $sender = null, $reciever = null, $tripdate = null){
        
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
        
        $trip = $this->Trips->get($trip_id, [
                'contain' => [
                    'Users'
                ]
            ])->toArray();
        
        
        if($this->request->is('post')){
            
            //echo "<pre>"; print_r($this->request->data); echo "</pre>"; exit; 
            
            $this->request->data['user_id'] = $sender;
            $this->request->data['trip_id'] = $trip_id;
            $this->request->data['sender'] = $sender;
            $this->request->data['reciever'] = $reciever;
            if(isset($this->request->data['trip_date'])){
            $this->request->data['trip_date']   =   date('d-m-Y', strtotime($this->request->data['trip_date']));
            }

            if($trip['user']['id'] != $sender){
                $orders = $this->Orders->find('all', [
                    'contain'    =>  [],
                    'conditions' =>  ['Orders.trip_id' => $trip_id, 'Orders.user_id' => $sender, 'Orders.trip_date' => $this->request->data['trip_date']],
                    'order'      =>  ['Orders.id' => 'desc']
                ])->first();

                if(empty($orders)){
                    
                    $this->request->data['status'] = 2;
                    
                    $orders = $this->Orders->newEntity();
                    $orders = $this->Orders->patchEntity($orders, $this->request->data);
                    $order  = $this->Orders->save($orders);
                }
            }
            
            $chat = $this->Chat->patchEntity($chat, $this->request->data);
            if($this->Chat->save($chat)){
                return $this->redirect(['action' => 'chat', $trip_id, $sender, $reciever, $this->request->data['trip_date']]);
            }

        }
        
        $chatdata = $this->Chat->find('all', [
           'contain'    =>  ['Trips', 'Sender_user', 'Reciever_user'],
           'conditions' =>  ['Chat.trip_id' => $trip_id, 'Chat.trip_date' => $tripdate, 'OR' => ['Chat.sender' => $this->Auth->user('id'), 'Chat.reciever' => $this->Auth->user('id')]],
           'order'      =>  ['Chat.id' => 'desc']
        ])->all()->toArray();
        
        $this->set('chatdata', $chatdata);
        $this->set('_serialize', ['chatdata']);
        
        /**********************/
        
        $tripdata = $this->Chat->find('all', [
           'contain'    =>  ['Trips' => ['Users', 'Tripprices'], 'Sender_user', 'Reciever_user'],
           'conditions' =>  ['Chat.trip_id' => $trip_id, 'Chat.trip_date' => $tripdate, 'OR' => ['Chat.sender' => $this->Auth->user('id'), 'Chat.reciever' => $this->Auth->user('id')]],
           'order'      =>  ['Chat.id' => 'asc']
        ])->first()->toArray();
        
        if($trip['user']['id'] != $sender){
            $tripdata = $this->Orders->find('all', [
                'contain'    =>  ['Trips' => ['Users', 'Tripprices']],
                'conditions' =>  ['Orders.trip_id' => $trip_id, 'Orders.trip_date' => $tripdate, 'Orders.user_id' => $sender, 'Orders.trip_date' => $tripdata['trip_date']],
                'order'      =>  ['Orders.id' => 'desc']
            ])->first()->toArray();
        }
        
        
        $this->set('tripdata', $tripdata);
        $this->set('_serialize', ['tripdata']);
        
        /*******************/
        
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
        $this->set('sender', $sender);
        
    }
    
    
    public function ajaxChangeChatReadStatus(){
        $this->loadModel('Chat');
        if($this->request->is('post')){
            $trip_id = $this->request->data['trip_id'];
            $this->Chat->updateAll(['read_status' => '1'],['trip_id' => $trip_id, 'reciever' => $this->Auth->user('id')]);
        }
    }
    
    public function ajaxAddMeetingpointToCart(){
        $session = $this->request->session();
        
        $cart = $session->read('Trip.cart');
        
        $cart['meetingpoint'] = $this->request->data['meetingpoint'];
        
        $session->write('Trip.cart', $cart);
        
        print_r($session->read('Trip.cart'));
        exit;
    }
    
    public function payment(){
        
        if(!$this->Auth->user('id')){
            $this->redirect('/');
        }
        
        //echo "</pre>"; print_r( $this->request->data); echo "</pre>"; exit;
        
        $session = $this->request->session();
        
        $cart = $session->read('Trip.cart');

        if(!isset($cart['date']) || $cart['date'] == '') {
            return $this->redirect('/');
        }
        
        if(!isset($cart['trip_id']) || $cart['trip_id'] == '') {
            return $this->redirect('/');
        }
        
        $this->loadModel('Trips');
        $trip = $this->Trips->get($cart['trip_id'], [
            'contain' => [
                        'Users', 'Tripprices'
                    ]
        ])->toArray();
        
        
        /***********  Price  **********/
        $price = 0.00;
        
        if(!empty($trip)){
            if($trip['pricing_type'] == 'basic'){
                $price = $trip['basic_price_per_person'] * $cart['quantity'];
            }elseif($trip['pricing_type'] == 'advance'){
                $this->loadModel('Tripprices');
                $tripprices = $this->Tripprices->find('all', [
                   'contain'    =>  ['Trips'],
                   'conditions' =>  ['Tripprices.trip_id' => $cart['trip_id'], 'Tripprices.person' => $cart['quantity']],
                   'order'      =>  ['Tripmeetingpoints.id' => 'desc']
                ])->first()->toArray();
                
                if(!empty($tripprices)){
                   $price = $tripprices['total_price'];
                }
            }
        }    
        /***********  Price (END) **********/
        
        /*********** Save Order  *********/
        
        $post = array();
        
        $post['user_id']            =   $this->Auth->user('id');
        $post['trip_id']            =   $cart['trip_id'];
        $post['trip_date']          =   date('d-m-Y', strtotime($cart['date']));
        $post['guests']             =   $cart['quantity'];
        $post['meeting_point']       =   isset($cart['meetingpoint']) ? $cart['meetingpoint'] : '';
        $post['guests']             =   $cart['quantity'];
        
        if($this->request->is('post')){
            $post['first_name']         =   $this->request->data['user']['first_name'];
            $post['last_name']          =   $this->request->data['user']['last_name'];
            $post['email']              =   $this->request->data['user']['email'];
            $post['phone']              =   $this->request->data['user']['phone'];
            $post['country_passport']   =   $this->request->data['user']['country'];
        }else{
            
            $this->loadModel('Users');
            $user = $this->Users->get($this->Auth->user('id'), [
                'contain' => []
            ])->toArray();
            
            $post['first_name']         =   $user['first_name'];
            $post['last_name']          =   $user['last_name'];
            $post['email']              =   $user['email'];
            $post['phone']              =   $user['phone'];
            $post['country_passport']   =   $user['country'];
        }
        
        $post['price']              =   $price;
        $post['trip_status']        =   'pending';
        $post['verification_code']  =   rand(100000, 999999);
        $post['ip_address']         =   $_SERVER['REMOTE_ADDR'];
        
        if($this->request->data['order_type'] == 'update'){
            
            $orders = $this->Orders->get($this->request->data['order_id'], [
                'contain' => []
            ]);
            
            $orders = $this->Orders->patchEntity($orders, $post);
            $order = $this->Orders->save($orders);
        }else{
            $orders = $this->Orders->newEntity();
            $orders = $this->Orders->patchEntity($orders, $post);
            $order = $this->Orders->save($orders);
        }
        
        
        
        /*********** Save Order (END)  *********/
        
        if($order){
            
            $order_id = base64_encode($order->id);
            $email = $post['email'];
            echo ".<form name=\"_xclick\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
            <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
            <input type=\"hidden\" name=\"email\" value=\"$email\">
            <input type=\"hidden\" name=\"business\" value=\"rupak1-facilitator@avainfotech.com\">
            <input type=\"hidden\" name=\"currency_code\" value=\"THB\">
            <input type=\"hidden\" name=\"custom\" value=\"$order->id\">
            <input type=\"hidden\" name=\"amount\" value=\"$price\">
            <input type=\"hidden\" name=\"return\" value=\"http://singhgurpreet.crystalbiltech.com/trip/orders/success/$order_id\"> 
            <input type=\"hidden\" name=\"notify_url\" value=\"http://singhgurpreet.crystalbiltech.com/trip/orders/ipn\">
            </form>";
            echo "<script>document._xclick.submit();</script>";
        }        
        
    }
    
    
    public function success($order_id = null){
        
        if(!$order_id){
            $this->redirect('/');
        }
        
        $order = $this->Orders->get(base64_decode($order_id), [
            'contain' => ['Trips' => ['Users']]
        ])->toArray();
        
        
        if(isset($_REQUEST['tx'])){ 
            $this->Orders->updateAll(array(
                'paypal_transaction_id' =>  $_REQUEST['tx'],
                'payment_status'        =>  $_REQUEST['st'],
                'status'                =>  1    
            ),array(
                'Orders.id'             =>  $_REQUEST['cm']
            )); 
            
            
            $email = new Email('default');
            $email->from(['me@example.com' => 'Platour Booking'])
                ->to($order['trip']['user']['email'])
                ->subject('About')
                ->send('My message');
            
            
            $response = 'success';
            
        }else{
            $response = 'error';
        }
        
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
        
        $this->set('response', $response);
        $this->set('_serialize', ['response']);
    }
    
    public function ipn(){

        $myfile = fopen("booking_ipn.txt", "a+") or die("Unable to open file!");
                fwrite($myfile, print_r($_POST, true));
                fclose($myfile);
        
//        ob_start();
//
//        $req = 'cmd=' . urlencode('_notify-validate');
//        
//        foreach ($_POST as $key => $value) {
//            $value = urlencode(stripslashes($value));
//            $req .= "&$key=$value";
//        }
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.developer.paypal.com'));
//        $res = curl_exec($ch);
//        curl_close($ch);
//
//        if (strcmp($res, "VERIFIED") == 0) {
//        } else if (strcmp($res, "INVALID") == 0) {
//        }
//
//        $xt = ob_get_clean();

    }
    

}

?>