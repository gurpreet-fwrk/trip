<section class="chat margin-top">

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="chat_area">

                    <form action="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" method="post" id="send-form">
                        <div class="chat_text">
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="message"></textarea>
                                <input type="hidden" name="trip_date" value="<?php echo date('d-m-Y', strtotime($tripdata['trip_date'])); ?>">
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
                        <p class="help-block right"><?php echo date('M d, Y h:i a', strtotime($chat['created'])); ?></p>
                    </div>
                    <?php }elseif($chat['reciever'] == $loggeduser['id']){ ?>
                    <div class="we yours">
                        <div class="chat_suptext">
                            <p><?php echo $chat['message'] ?></p>
                            <div class="chat_user">
                                <div class="chat_pic"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($chat['sender_user']['image'] != '') ? $chat['sender_user']['image']: 'noimage.png' ?>" /></div>
                            </div>
                        </div>
                        <p class="help-block"><?php echo date('M d, Y h:i a', strtotime($chat['created'])); ?></p>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                
                <?php //echo "<pre>"; print_r($tripdata); echo "</pre>"; ?>
                
                <div class="chat_sidebar">
                    <div class="side_pic">
                        <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($tripdata['trip']['user']['image'] != '') ? $tripdata['trip']['user']['image'] : 'noimage.png' ?>" />
                        <h3><?php echo ucwords($tripdata['trip']['user']['name']); ?></h3>
                        <h6>Member since <?php echo date('F Y', strtotime($tripdata['trip']['user']['created'])); ?></h6>
                        <h4><a href="<?php echo $this->request->webroot ?>trips/view/<?php echo base64_encode('view'.$tripdata['trip_id']); ?>"><?php echo ucwords($tripdata['trip']['title_'.$config_language]); ?></a></h4>
                    </div>
                    
                    <form action="<?php echo $this->request->webroot ?>orders/create">
                        <ul class="choose_edit current_trip">
                            <li>
                                <h4><i class="fa fa-calendar" ></i> Trip date</h4>
                                <p><?php echo date('F d, Y', strtotime($tripdata['trip_date'])); ?>
                                    <?php if($tripdata['trip']['user']['id'] != $sender || $tripdata['status'] != 1){ ?>
                                    <button class="btn btn-link" id="edit" type="button">(Edit)</button>
                                    <?php } ?>
                                </p>
                                <input type="hidden" name="step" value="2">
                                <input type="hidden" name="trip_id" value="<?php echo $tripdata['trip_id']; ?>">
                                <input type="hidden" name="date" value="<?php echo date('Y/m/d', strtotime($tripdata['trip_date'])); ?>">
                            </li>
                            <li>
                                <h4><i class="fa fa-users" ></i> Guest(s)</h4>
                                <p><?php echo $tripdata['guests']; ?>
                                    <?php if($tripdata['trip']['user']['id'] != $sender || $tripdata['status'] != 1){ ?>
                                    <button class="btn btn-link" id="edit" type="button">(Edit)</button>
                                    <?php } ?>
                                </p>
                                <input type="hidden" name="quantity" value="<?php echo $tripdata['guests']; ?>">
                            </li>
                            <?php if($tripdata['trip']['user']['id'] != $sender){ ?>
                            <li>
                                <h4><i class="fa fa-map-marker" ></i> Meeting point</h4>
                                <p><button type="button" class="btn btn-primary blue" data-toggle="modal" data-target="#mp_modal">Choose</button></p>
                                <input type="hidden" name="meetingpoint">
                            </li>
                            <?php } ?>
                            <li>
                                <h4><i class="fa fa-usd" ></i> Total price</h4>


                                <?php
                                $amount = 1;
                                $from_Currency = urlencode('THB');
                                $to_Currency = urlencode($config_currency);
                                $get = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");

                                if($from_Currency != $to_Currency){
                                    $get = explode("<span class=bld>", $get);
                                    $get = explode("</span>", $get[1]);
                                    $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
                                }else{
                                    $converted_currency = 1;
                                }
                                ?>

                                <?php if($tripdata['trip']['pricing_type'] == 'basic'){ ?>
                                <p><?php echo $config_currency.' '.($tripdata['trip']['basic_price_per_person'] * $tripdata['guests'] * $converted_currency); ?> <!--<button class="btn btn-link" id="edit">(Edit)</button>--></p>
                                <?php }elseif($tripdata['trip']['pricing_type'] == 'advance'){ ?>
                                <?php foreach($tripdata['trip']['tripprices'] as $price){ ?>
                                <?php if($price['person'] == $tripdata['guests']){ ?>
                               <p><?php echo $config_currency.' '.($price['trip']['price_per_person'] * $tripdata['guests'] * $converted_currency); ?> <!-- <button class="btn btn-link" id="edit">(Edit)</button>--></p>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </li>
                        </ul>
                        <input type="hidden" name="order_type" value="update">
                        <input type="hidden" name="order_id" value="<?php echo $tripdata['id']; ?>">
                        
                        
                        <?php if($tripdata['trip']['user']['id'] != $sender){ ?>
                        <div class="current_trip">
                            <p>The trip fee will be charged upon local experts confirmation</p>
                            <?php if($tripdata['status'] != 1){ ?>
                            <button type="submit" class="btn btn-primary blue">Book</button>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </form>
                    
                    <form action="<?php echo $this->request->webroot ?>orders/create">
                        <ul class="choose_edit edit_trip" style="display: none;">
                            <li>
                                <h4><i class="fa fa-calendar" ></i> Trip date</h4>
                                <p><input type="text" name="date" value="<?php echo date('F d, Y', strtotime($tripdata['trip_date'])); ?>" id="tripdatepicker"></p>
                                <input type="hidden" name="trip_id" value="<?php echo $tripdata['trip_id']; ?>">
                                <input type="hidden" name="step" value="2">
                            </li>
                            <li>
                                <h4><i class="fa fa-users" ></i> Guest(s)</h4>
                                <p>

                                    <select name="quantity">
                                        <?php for($i=1;$i<=$tripdata['trip']['travellers']; $i++){ ?>
                                        <?php if($i == $tripdata['guests']){ ?>
                                        <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>

                                </p>
                            </li>

                            <li>
                                <h4><i class="fa fa-map-marker" ></i> Meeting point</h4>
                                <p><button type="button" class="btn btn-primary blue" data-toggle="modal" data-target="#mp_modal">Choose</button></p>
                                <input type="hidden" name="meetingpoint">
                            </li>

                            <li>
                                <h4><i class="fa fa-usd" ></i> Total price</h4>
                                <p>

                                    <select>
                                        <option>THB</option>
                                    </select>

                                </p>
                            </li>
                        </ul>    

                        <input type="hidden" name="order_type" value="update">
                        <input type="hidden" name="order_id" value="<?php echo $tripdata['id']; ?>">
                            
                        <div class="edit_trip" style="display: none;">
                            <p>The trip fee will be charged upon local experts confirmation</p>
                            <?php if($tripdata['status'] != 1){ ?>
                            <button type="submit" class="btn btn-primary blue">Book</button>
                            <button type="button" class="btn btn-primary blue" id="cancel">Cancel</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div id="mp_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Choose Meeting point</h4>
            </div>
            <div class="modal-body">
                <?php //echo "<pre>"; print_r($tripmeetingpoints); echo "</pre>"; ?>
                <?php
                $mps = array();
                foreach($tripmeetingpoints as $mp){
                    if($config_language == 'ar' && $mp['language'] == 'ar'){
                        $mps[$mp['meeting_point_type']][] = $mp['meeting_point'];
                    } elseif($config_language == 'en' && $mp['language'] == 'ar'){
                        
                        $mps[$this->Text->changelanguage('ar', 'en', $mp['meeting_point_type'])][] = $this->Text->changelanguage('ar', 'en', $mp['meeting_point']);
                    } elseif($config_language == 'ar' && $mp['language'] == 'en'){
                        $mps[$this->Text->changelanguage('en', 'ar', $mp['meeting_point_type'])][] = $this->Text->changelanguage('en', 'ar', $mp['meeting_point']);
                    }else{
                        $mps[$mp['meeting_point_type']][] = $mp['meeting_point'];
                    }
                }
                //echo "<pre>"; print_r($mps); echo "</pre>";
                ?>
                <ul class="list-group">
                    <?php $i=1; ?>
                    <?php foreach($mps as $key => $value){ ?>
                    <li class="list-group-item" data-toggle="collapse" data-target="#gurpreet<?php echo $i; ?>">
                        <?php echo $key; ?>
                    </li>
                    <div id="gurpreet<?php echo $i; ?>" class="collapse <?php echo ($i==1) ? 'in' : '' ?>">
                    <?php for($i = 0; $i< count($value); $i++){ ?>
                    <div class="radio">
                        <label><input type="radio" name="meetingpoint" value="<?php echo $key.', '.$value[$i]; ?>"><?php echo $value[$i]; ?></label>
                    </div>
                    <?php  } ?>
                    </div>
                    <?php $i++; ?>
                    <?php } ?>
                </ul>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="select_mp">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

<script>
setInterval(function()
{
    //$('.col-sm-8 .chat_area').load('.chat_area');
    $(".col-sm-8 .refresh-div").load(location.href+" .col-sm-8 .refresh-div>*","");

    
    
}, 2000);

$(document).delegate("#send-form", "click", function(){
    var message = $("#send-form textarea").val();
    var trip_date = $("#send-form input[name='trip_date']").val();
    if(message != ''){
        $.ajax({
           url: "<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" ,
           data: {message: message, trip_date: trip_date},
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

/*************/

$(".current_trip #edit, .edit_trip #cancel").click(function(){
   $(".current_trip").toggle(); 
   $(".edit_trip").toggle(); 
});

</script>

<script>
var enableDays = [];

jQuery(function(){

    var availabilities = $.parseJSON('<?php echo json_encode($availabilities) ?>');
    for(i=0; i<Object.keys(availabilities).length; i++){
            enableDays.push(availabilities[i]['date']);;
    }

    function enableAllTheseDays(date) {
        var sdate = $.datepicker.formatDate( 'yy/m/d', date)
        if($.inArray(sdate, enableDays) != -1) {
            return [true];
        }
        return [false];
    }

    $('#tripdatepicker').datepicker({dateFormat: 'yy/m/d', beforeShowDay: enableAllTheseDays});
	
	//$("#datepickers").trigger("change");
	
	
})


$("#select_mp").click(function(){
   var value = $("input[name='meetingpoint']:checked").val();
   
   if(value != undefined){
       $("input[name='meetingpoint']").val(value);
       $("input[name='meetingpoint']").prev('p').html(value);
       $("#select_mp").next('button').trigger('click');
   }

});
</script>