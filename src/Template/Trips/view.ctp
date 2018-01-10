<!-- Gallery Section Start Here -->
<section class="gallery_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul id="lightgallery" class="list-unstyled row">
                <?php foreach($trip['tripgallery'] as $image){ ?>
                <li class="col-xs-12" data-responsive="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 375, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 480, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 800" data-src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>"> <a href=""> <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>"> </a> </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End Here -->


<section class="product_detail">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
        <div class="row">
            <div class="col-sm-9">
                
                <div class="share">
                    <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> <span><?php echo $this->Text->lang('text_share'); ?></span></a>
                    <?php if($loggeduser){ ?>
                    <?php if(empty($wishlist)){ ?>
                    <a id="add_wishlist" data-id="<?php echo $trip['id']; ?>"><i class="fa fa-heart-o" aria-hidden="true"></i> <span><?php echo $this->Text->lang('text_add_wishlist'); ?></span></a>
                    <?php }else{ ?>
                    <a id="add_wishlist" data-id="<?php echo $trip['id']; ?>"><i class="fa fa-heart" aria-hidden="true"></i> <span><?php echo $this->Text->lang('text_add_wishlist'); ?></span></a>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
                
                <div class="tour_desc">
                    <h2><?php echo ucwords($trip['title_'.$config_language]); ?></h2>
                    <p><img src="<?php echo $this->request->webroot ?>images/website/loc.png" /><?php echo $trip['location']['name_'.$config_language]; ?></p>
                    <div class="satisfy">
                        <span><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->Text->lang('text_satisfaction_guaranteed'); ?></span>
                        <?php if($trip['hotel_pickup'] == 1){ ?>
                        <span><i class="fa fa-check" aria-hidden="true"></i> <?php echo $this->Text->lang('text_hotel_pickup'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="explore">
                        <p>Exploring the old town area with your local expert! Indulge yourself in this beautiful city along the river.</p>
                        <ul>
                            <li><i><img src="<?php echo $this->request->webroot ?>images/transport_vehicles/<?php echo $trip['transportation']['icon'] ?>"></i><span><?php echo $trip['transportation']['title_'.$config_language]; ?></span></li>
                            
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><span>7 hours</span></li>
                            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>2,505 travelers liked</span></li>
                            <div class="line"></div>
                            
                            <?php foreach($trip['tripactivities'] as $act){ ?>
                            <li><i><img src="<?php echo $this->request->webroot ?>images/uploads/<?php echo $act['activity']['icon'] ?>" width="48px"></i><span><?php echo $act['activity']['title_'.$config_language]; ?></span></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="hosted"> <i class="left"><img src="<?php echo $this->request->webroot ?>images/users/<?php echo $trip['user']['image'] ?>" /></i>
                        <div class="host_name left">
                            <h5><?php echo $this->Text->lang('text_hosted_by'); ?></h5>
                            <h2><?php echo $trip['user']['name']; ?></h2>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="ques">
                        <h3><?php echo $this->Text->lang('text_faq'); ?></h3>
                        <div class="faq">
                            <div class="faq_ques"> <?php echo $this->Text->lang('text_faq1_detail_tab'); ?> </div>
                            <div class="faq_ques"> <?php echo $trip['faq1']; ?> </div>
                        </div>
                        <div class="faq">
                            <div class="faq_ques"> <?php echo $this->Text->lang('text_faq22_detail_tab'); ?> </div>
                            <div class="faq_ques"> <?php echo $trip['faq2']; ?> </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section Start Here -->
                <div class="gallery_sec gal_sec">
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="lightgallerys" class="list-unstyled row">
                                <?php foreach($trip['tripgallery'] as $image){ ?>
                                <li class="col-xs-6 col-md-4" data-responsive="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 375, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 480, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 800" data-src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>">
                                    <div class="img_wrapper"> <a href=""> <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>"> </a> </div>
                                </li>
                                <?php } ?>
                                
<!--                                <li class="col-xs-6 col-md-4" data-responsive="images/tour.jpg 375, images/tour.jpg 480, images/tour.jpg 800" data-src="images/tour.jpg">
                                    <div class="img_wrapper"> <a href=""> <img class="img-responsive" src="images/tour.jpg"> </a>
                                        <h4>See all 12 photos</h4>
                                        <div class="overlay"></div>
                                    </div>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Gallery Section End Here -->
                <div class="ques">
                    <h3><?php echo $this->Text->lang('text_itinerary'); ?></h3>
                    
                    <?php
                    if($trip['schedule'] != ''){
                    $schedule = json_decode($trip['schedule']);
                    if(!empty($schedule)){
                    ?>
                    <?php foreach($schedule as $sc){ ?>
                    <div class="faq">
                        <div class="faq_ques"> <?php echo $sc->hours . ':' . $sc->minutes; ?></div>
                        <div class="faq_ques"> <?php echo $this->Text->changelanguage($trip['language'], $config_language, html_entity_decode($sc->content, ENT_QUOTES, "UTF-8")); ?> </div>
                    </div>                    
                    <?php } ?>
                    <?php }else{ ?>
                    No Itineraries.
                    <?php } ?>
                    <?php }else{ ?>
                    No Itineraries.
                    <?php } ?>
                    
                </div>
                <!--ques-->

                <div class="ques">
                    <h3><?php echo $this->Text->lang('text_trip_detail'); ?></h3>
                    <div class="faq">
                        <div class="faq_ques"> <i class="fa fa-car" aria-hidden="true"></i> <?php echo $this->Text->lang('text_main_transportation'); ?> : </div>
                        <div class="faq_ques"> <?php echo $trip['transportation']['title_'.$config_language]; ?> </div>
                    </div>
                    <div class="faq">
                        <div class="faq_ques"> <i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->Text->lang('text_max_travellers'); ?> : </div>
                        <div class="faq_ques"> <?php echo $trip['travellers']; ?> </div>
                    </div>
                    <div class="faq">
                        <div class="faq_ques"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $this->Text->lang('text_languages'); ?> : </div>
                        <div class="faq_ques"> <?php echo $trip['user']['languages']; ?> </div>
                    </div>
                    <div class="faq">
                        <div class="faq_ques"> <i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $this->Text->lang('text_condition'); ?> : </div>
                        <div class="faq_ques">
                            <?php foreach($trip['tripextraconditions'] as $condition) {?>
                            <i><img src="<?php echo $this->request->webroot; ?>images/uploads/<?php echo $condition['extracondition']['icon']; ?>" /></i> <?php echo $condition['extracondition']['title_'.$config_language]; ?><br>
                            <?php } ?>
                        </div>
                    </div>
                </div> 
                <!--ques-->

                <div class="ques">
                    <h3><?php echo $this->Text->lang('text_price_condition'); ?></h3>
                    <div class="faq meet">
                        <div class="faq_ques fd">
                            
                            <?php if($trip['include_exclude'] == 'all_inclusive'){ ?>
                            
                            <img src="<?php echo $this->request->webroot ?>images/website/all_include_1.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_include_2.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_include_3.png">
                            <?php echo ($config_language == 'en') ? 'All inclusive' : 'الجميع مشمول'; ?>
                            
                            <?php }elseif($trip['include_exclude'] == 'food_excluded'){ ?>
                            
                            <img src="<?php echo $this->request->webroot ?>images/website/food_exclude_1.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_include_2.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_include_3.png">
                            <?php echo ($config_language == 'en') ? 'Food Excluded' : 'الغذاء المستثنى'; ?>
                            
                            <?php }elseif($trip['include_exclude'] == 'all_excluded'){ ?>
                            
                            <img src="<?php echo $this->request->webroot ?>images/website/food_exclude_1.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_exclude_1.png">
                            <img src="<?php echo $this->request->webroot ?>images/website/all_exclude_2.png">
                            
                            <?php echo ($config_language == 'en') ? 'Food, Transportation, Admission fee excluded' : 'الغذاء، النقل، رسوم القبول مستثناة'; ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if($trip['include_exclude'] == 'all_inclusive'){ ?>
                            
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-check" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Transportation fares are included.' : 'يتم تضمين أسعار النقل.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-check" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? '
Admission fees are included.' : 'يتم تضمين رسوم الدخول.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-check" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Meals are included' : 'يتم تضمين الوجبات'; ?></div>
                    </div>

                    <?php }elseif($trip['include_exclude'] == 'food_excluded'){ ?>

                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-check" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Transportation fares are included.' : 'يتم تضمين أسعار النقل.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-check" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? '
Admission fees are included.' : 'يتم تضمين رسوم الدخول.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-times" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Meals are excluded' : 'يتم استبعاد الوجبات'; ?></div>

                    <?php }elseif($trip['include_exclude'] == 'all_excluded'){ ?>

                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-times" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Transportation fares are excluded.' : 'ويستثنى من ذلك أسعار النقل.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-times" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? '
Admission fees are excluded.' : 'يتم استبعاد رسوم الدخول.'; ?></div>
                    </div>
                    <div class="faq meet">
                        <div class="faq_ques fd"><i class="fa fa-times" aria-hidden="true"></i> <?php echo ($config_language == 'en') ? 'Meals are excluded' : 'يتم استبعاد الوجبات'; ?></div>
                    
                    <?php } ?>
                </div>
                <!--ques-->

                <div class="ques">
                    <h3><?php echo $this->Text->lang('text_meeting_point'); ?></h3>
                    <?php
                    $meetingpoints = array();
                    
                    foreach($trip['tripmeetingpoints'] as $tripmeetingpoint){
                        $meetingpoints[$tripmeetingpoint['meeting_point_type']][] = $tripmeetingpoint['meeting_point'];
                    }
                    foreach($meetingpoints as $key => $value){
                    ?>
                    <div class="faq meet">
                        <div class="faq_ques">
                            <i><!--<img src="images/bts.png" />--></i> 
                            <?php echo $this->Text->changelanguage($trip['language'], $config_language, $key); ?>
                        </div>
                        <div class="faq_ques">
                            <?php foreach($value as $val){ ?>
                            - 
                            <?php echo $this->Text->changelanguage($trip['language'], $config_language, $val); ?>
                            <br>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!--ques-->
                
                <div id="map" style="width:100%;height:400px;background:#498ebe" class="mp"></div>
            </div>
                </div>
            <!--col-sm-9-->

            <div class="col-sm-3">
                <div class="instant">
                    <div id="datepickers" class="datepicks"></div>
                    <div class="pern">
                        <p><i class="fa fa-users" aria-hidden="true"></i> Guest(s)</p>
                        <span >
                            <select class="form-control" id="max_trav">
                                <?php for($i=1;$i<=$trip['travellers'];$i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                        <div class="line" style="margin-bottom:10px;"></div>
                        
                        <?php if($trip['pricing_type'] == 'basic'){ ?>
                        <div class="trip_price" data-price="<?php echo $trip['basic_price_per_person']; ?>">
                            <p> <i class="fa fa-user" aria-hidden="true"></i> Price per person</p>
                            <span><?php echo $trip['basic_price_per_person']; ?> THB</span>
                            <p> <i class="fa fa-usd" aria-hidden="true"></i> Total price</p>
                            <span id="total"><?php echo $trip['basic_price_per_person']; ?> THB</span>
                        </div>
                        <?php } ?>
                        
                        <?php if($trip['pricing_type'] == 'advance'){ ?>
                        <div class="trip_price">
                            <p> <i class="fa fa-user" aria-hidden="true"></i> Price per person</p>
                            <span>1,750 THB</span>
                            <p> <i class="fa fa-usd" aria-hidden="true"></i> Total price</p>
                            <span id="total">3,500 THB</span>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <p>100% Satisfaction guaranteed <sub>?</sub> </p>
                    <button type="submit" class="btn btn-primary blue">Instant book</button>
                    <button class="btn btn-default" type="submit" style="border-radius:0px;">Send a message</button>
                </div>
            </div>
            <!--col-sm-3-->
            <div class="view_fav similar"> 

                <h2><?php echo $this->Text->lang('text_similar_trips'); ?></h2>
                <div class="col-sm-4">
                    <div class="show_data">
                        <div class="show_pic"> <img src="images/log.png">
                            <div class="show_text">
                                <h4><img src="images/loc.png"><span>Bankok</span></h4>
                                <div class="ratng">
                                    <ul class="no-margin no-padding">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <p>THB 1,750.00</p>
                                </div>
                                <span>per person</span> </div>
                        </div>
                        <div class="show_subtext">
                            <p>Our Old Walking Tour</p>
                            <h4><img src="images/user.jpg"> <span>Platpur Expert Shady</span>.</h4>
                        </div>
                    </div>
                    <!--show_data--> 
                </div>
                <!--col-sm-4--> 

                <div class="col-sm-4">
                    <div class="show_data">
                        <div class="show_pic"> <img src="images/log.png">
                            <div class="show_text">
                                <h4><img src="images/loc.png"><span>Bankok</span></h4>
                                <div class="ratng">
                                    <ul class="no-margin no-padding">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <p>THB 1,750.00</p>
                                </div>
                                <span>per person</span> </div>
                        </div>
                        <div class="show_subtext">
                            <p>Our Old Walking Tour</p>
                            <h4><img src="images/user.jpg"> <span>Platpur Expert Shady</span>.</h4>
                        </div>
                    </div>
                    <!--show_data--> 
                </div>
                <!--col-sm-4--> 

                <div class="col-sm-4">
                    <div class="show_data">
                        <div class="show_pic"> <img src="images/log.png">
                            <div class="show_text">
                                <h4><img src="images/loc.png"><span>Bankok</span></h4>
                                <div class="ratng">
                                    <ul class="no-margin no-padding">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <p>THB 1,750.00</p>
                                </div>
                                <span>per person</span> </div>
                        </div>
                        <div class="show_subtext">
                            <p>Our Old Walking Tour</p>
                            <h4><img src="images/user.jpg"> <span>Platpur Expert Shady</span>.</h4>
                        </div>
                    </div>
                    <!--show_data--> 
                </div>
                <!--col-sm-4--> 

            </div>
        </div>
    </div>
</section>

<?php //echo "<pre>"; print_r($trip); echo "</pre>"; ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
});

$(document).ready(function(){
    $('#lightgallerys').lightGallery();
});

$(function() {
  $( "#datepickers" ).datepicker();
});
    
var allocation = $.parseJSON('<?php echo json_encode($trip['tripmeetingpoints']) ?>');  

var alllocations = [];

var i;	

for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['latitude'] != ''){
        alllocations.push([allocation[i]['meeting_point'],allocation[i]['latitude'],allocation[i]['longitude']] );
    }    
}

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(alllocations[0][1], alllocations[0][2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < alllocations.length; i++) {  
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(alllocations[i][1], alllocations[i][2]),
      map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(alllocations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
  
  
$("#add_wishlist").click(function(){
   var trip_id = $(this).attr('data-id');
   $.ajax({
       url: '<?php echo $this->request->webroot ?>trips/addtowishlist',
       data: {trip_id: trip_id},
       method: 'post',
       dataType: 'json',
       success: function(response){
           if(response.msg == 'removed'){
               $("#add_wishlist i").removeClass("fa-heart").addClass("fa-heart-o");
           }else if(response.msg == 'added'){
               $("#add_wishlist i").removeClass("fa-heart-o").addClass("fa-heart");
           }
       }
   });
   
});

$("#max_trav").change(function(){
    var travelers = $(this).val();
    
    var single_price = $(".trip_price").attr("data-price");
    
    var total_price = travelers * single_price;
    
    $(".trip_price #total").html(total_price+' THB');
    
});
    
</script> 
