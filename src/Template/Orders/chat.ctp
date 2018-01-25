<section class="chat margin-top">

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="chat_area">

                    <form action="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" method="post" id="send-form">
                        <div class="chat_text">
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="message"></textarea>
                                <button type="button" class="btn btn-primary blue">Send message</button>
                            </div>
                            <div class="chat_user">
                                <div class="chat_pic"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($loggeduser['image'] != '') ? $loggeduser['image']: 'noimage.png' ?>" /></div>
                            </div>
                        </div>
                    </form>
                    <?php //echo "<pre>"; print_r($chatdata); echo "</pre>"; ?>
                    <div class="refresh-div">
                    <?php foreach($chatdata as $chat){ ?>
                    <?php if($chat['sender'] == $loggeduser['id']){ ?>
                    <div class="we">
                        <div class="chat_subtext">
                            <p><?php echo $chat['message'] ?></p>
                            <div class="chat_user">
                                <div class="chat_pic"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($chat['sender_user']['image'] != '') ? $chat['sender_user']['image']: 'noimage.png' ?>" /></div>
                            </div>
                        </div>
                        <p class="help-block right"><?php echo date('M d, Y', strtotime($chat['created'])); ?></p>
                    </div>
                    <?php }elseif($chat['reciever'] == $loggeduser['id']){ ?>
                    <div class="we yours">
                        <div class="chat_suptext">
                            <p><?php echo $chat['message'] ?></p>
                            <div class="chat_user">
                                <div class="chat_pic"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($chat['sender_user']['image'] != '') ? $chat['sender_user']['image']: 'noimage.png' ?>" /></div>
                            </div>
                        </div>
                        <p class="help-block"><?php echo date('M d, Y', strtotime($chat['created'])); ?></p>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="chat_sidebar">
                    <div class="side_pic">
                        <img src="images/logo.png" />
                        <h3>Platour Local Expert</h3>
                        <h6>Member since February 2015</h6>
                        <h4>Old Town Walking Tour</h4>
                    </div>
                    <ul class="choose_edit">
                        <li>
                            <h4><i class="fa fa-calendar" ></i> Trip date</h4>
                            <p>December 10, 2017 <button class="btn btn-link">(Edit)</button></p>
                        </li>
                        <li>
                            <h4><i class="fa fa-users" ></i> Guest(s)</h4>
                            <p>2 <button class="btn btn-link">(Edit)</button></p>
                        </li>
                        <li>
                            <h4><i class="fa fa-map-marker" ></i> Meeting point</h4>
                            <p><button class="btn btn-primary blue">Choose</button></p>
                        </li>
                        <li>
                            <h4><i class="fa fa-usd" ></i> Total price</h4>
                            <p>THB 4,073.50 <button class="btn btn-link">(Edit)</button></p>
                        </li>
                    </ul>
                    <p>The trip fee will be charged upon local experts confirmation</p>
                    <button class="btn btn-primary blue">Book</button>
                </div>
            </div>
        </div>
    </div>

</section>


<script>
setInterval(function()
{
    //$('.col-sm-8 .chat_area').load('.chat_area');
    $(".col-sm-8 .refresh-div").load(location.href+" .col-sm-8 .refresh-div>*","");

    
    
}, 2000);

$(document).delegate("#send-form", "click", function(){
    var message = $("#send-form textarea").val();
    if(message != ''){
        $.ajax({
           url: "<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" ,
           data: {message: message},
           method: 'post',
           beforeSend: function(){
               $("#send-form button").text('Please Wait...');
           },
           success: function(response){
               $("#send-form textarea").val('')
               $("#send-form button").delay("slow").text('Sent <i class="fa fa-check-circle" aria-hidden="true"></i>');
               $("#send-form button").delay("slow").text('Send message');
               
                $.ajax({
                    url: "<?php echo $this->request->webroot ?>orders/ajaxChangeChatReadStatus" ,
                    data: {trip_id: '<?php echo $trip_id ?>'},
                    method: 'post',
                    success: function(response){
                    }
                });
           }
        });
    }
});

$.ajax({
    url: "<?php echo $this->request->webroot ?>orders/ajaxChangeChatReadStatus" ,
    data: {trip_id: '<?php echo $trip_id ?>'},
    method: 'post',
    success: function(response){
    }
});

</script>