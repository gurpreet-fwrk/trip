<!-- Gallery Section Start Here -->
<section class="gallery_sec">
                <ul id="lightgallery" class="list-unstyled row">
                    
                    <?php if($trip['video'] != ''){ ?>
                    
                    <?php if($trip['image'] != ''){
                        $imagee = $this->request->webroot.'images/trips/'. $trip["image"];
                    }else{
                        $imagee = $this->request->webroot.'images/website/no-image.png';
                    } ?>
                    
                    <a href="https://www.youtube.com/watch?v=meBbDqAXago" data-poster="<?php echo $imagee; ?>" >
                        <img src="<?php echo $imagee; ?>" width="100%">
                    </a>
                    <?php } elseif($trip['image'] != ''){ ?>
                    <li class="col-xs-12" data-responsive="<?php echo $this->request->webroot; ?>images/trips/<?php echo $trip['image']; ?> 375, <?php echo $this->request->webroot; ?>images/trips/<?php echo $trip['image']; ?> 480, <?php echo $this->request->webroot; ?>images/trips/<?php echo $trip['image']; ?> 800" data-src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $trip['image']; ?>"> <a href=""> <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $trip['image']; ?>"> </a> </li>
                    <?php } ?>
                    <?php foreach($trip['tripgallery'] as $image){ ?>
                    <li class="col-xs-12" data-responsive="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 375, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 480, <?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?> 800" data-src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>"> <a href=""> <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image['file']; ?>"> </a> </li>
                    <?php } ?>
                </ul>
</section>
<!-- Gallery Section End Here -->
<?php //echo "<pre>"; print_r($trip); echo "</pre>" ?>;

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
                    <a data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt" aria-hidden="true"></i> <span><?php echo $this->Text->lang('text_share'); ?></span></a>
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
                    </div>
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
                    </div>
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
            <!--col-sm-9-->

            <div class="col-sm-3">
                <div class="instant">
                    <form id="requestBook">
                    <div id="datepickers" class="datepicks"></div>
                    <input type="hidden" name="date" />
                    <input type="hidden" name="trip_id" value="<?php echo $trip['id'] ?>" />
                    <div class="pern">
                        <p><i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->Text->lang('text_guests'); ?></p>
                        <span >
                            <select class="form-control" id="max_trav" name="quantity">
                                <?php for($i=1;$i<=$trip['travellers'];$i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                        <div class="line" style="margin-bottom:10px;"></div>
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
                        
                        <?php if($trip['pricing_type'] == 'basic'){ ?>
                        <div class="trip_price" data-price="<?php echo $trip['basic_price_per_person'] * $converted_currency; ?>">
                            <p> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->Text->lang('text_price_person'); ?></p>
                            <span id="single"><?php echo number_format($trip['basic_price_per_person']  * $converted_currency, 2); ?> <?php echo $config_currency; ?></span>
                            <input type="hidden" name="single_price" value="<?php echo $trip['basic_price_per_person'] * $converted_currency; ?>" disabled="disabled">
                            <p> <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $this->Text->lang('text_price_total'); ?></p>
                            <span id="total"><?php echo number_format($trip['basic_price_per_person']  * $converted_currency, 2); ?> <?php echo $config_currency; ?></span>
                            <input type="hidden" name="total_price" value="<?php echo $trip['basic_price_per_person'] * $converted_currency; ?>" disabled="disabled">
                        </div>
                        <?php } ?>
                        
                        <?php if($trip['pricing_type'] == 'advance'){ ?>
                        
                        
                        
                        <div class="trip_price">
                            <p> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->Text->lang('text_price_person'); ?></p>
                            <span id="single"><?php echo number_format($trip['tripprices'][0]['price_per_person'] * $converted_currency, 2); ?> <?php echo $config_currency; ?></span>
                            <input type="hidden" name="single_price" value="<?php echo $trip['tripprices'][0]['price_per_person'] * $converted_currency; ?>" disabled="disabled">
                            <p> <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $this->Text->lang('text_price_total'); ?></p>
                            <span id="total"><?php echo number_format($trip['tripprices'][0]['total_price'] *$converted_currency, 2); ?> <?php echo $config_currency; ?></span>
                            <input type="hidden" name="total_price" value="<?php echo $trip['tripprices'][0]['price_per_person'] * $converted_currency; ?>" disabled="disabled">
                        </div>
                        <?php } ?>
                        
                    </div>
                    <p><?php echo $this->Text->lang('text_satisfaction_guaranteed'); ?> <sub>?</sub> </p>
                    <button type="button" class="btn btn-primary blue" data-type="book"><?php echo $this->Text->lang('text_instant_book'); ?></button>
                    <button class="btn btn-default" type="button" data-type="message" style="border-radius:0px;"><?php echo $this->Text->lang('text_send_msg'); ?></button>
                    </form>
                </div>
            </div>
            <!--col-sm-3-->
<!--            <div class="view_fav similar"> 

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
                    show_data 
                </div>
                col-sm-4 

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
                    show_data 
                </div>
                col-sm-4 

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
                    show_data 
                </div>
                col-sm-4 

            </div>-->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            
            <div class="modal-body" style="overflow: hidden; text-align: center;">
                <div class="col-md-12">
                    
                    <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                    
                    <?php $webroot_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>
                    
                    <div class="col-md-6">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" target="_blank">
                            <img src="<?php echo $this->request->webroot ?>images/website/facebook-c.png">
                            <p>Facebook</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://twitter.com/home?status=<?php echo $actual_link; ?>" target="_blank">
                            <img src="<?php echo $this->request->webroot ?>images/website/twitter-c.png">
                            <p>Twitter</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $webroot_link.'/'.$this->request->webroot ?>/images/trips/<?php echo $trip['tripgallery'][0]['file']; ?>&media=<?php echo $trip['tripgallery'][0]['file']; ?>&description=" target="_blank">
                            <img src="<?php echo $this->request->webroot ?>images/website/pinterest-c.png">
                            <p>Pinterest</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" target="_blank">
                            <img src="<?php echo $this->request->webroot ?>images/website/google-c.png">
                            <p>Google Plus</p>
                        </a>
                    </div>
                </div>
            </div>
            
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

/*** Datepicker (right side) ***/

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

    $('#datepickers').datepicker({dateFormat: 'yy/m/d', beforeShowDay: enableAllTheseDays});
	
	//$("#datepickers").trigger("change");
	
	
})

$(document).delegate("#datepickers", "change",function(){
	var selected = $('#datepickers').val();
	$('input[name="date"]').val(selected);
});

/*** Datepicker (right side) (END) ***/

/*** Google Map ***/
    
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
  
/*** Google Map (END) ***/  

/**** Add or remove from wishlist ****/
  
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

/**** Add or remove from wishlist (END) ****/



$("#max_trav").change(function(){

    var travelers = $(this).val();
    
    var pricing_type = '<?php echo $trip['pricing_type'] ?>';
    
    if(pricing_type == 'basic'){
        var single_price = $(".trip_price").attr("data-price");
        var total_price = travelers * single_price;
        $(".trip_price #total").html(total_price.toFixed(2)+' <?php echo $config_currency ?>');
        $(".trip_price input[name='total_price']").val(total_price);
    }else{
        
        $.ajax({
           url: '<?php echo $this->request->webroot ?>trips/ajaxtripdata?action=getAdvancePriceBypersons',
           data: {travelers: travelers, trip_id: '<?php echo $trip["id"] ?>'},
           method: 'post',
           dataType: 'json',
           success: function(json){
               
               $(".trip_price #single").html(json.price_per_person.toFixed(2)+' '+json.currency);
               $(".trip_price #total").html(json.total_price.toFixed(2)+' '+json.currency);
               
               $(".trip_price input[name='single_price']").val(json.price_per_person);
               $(".trip_price input[name='total_price']").val(json.total_price);
               
               $(".trip_price").attr("data-price", json.price_per_person);
           }
        }); 
    }
});   

/*********/ 

$("#requestBook button").click(function(){

    if($("input[name='date']").val() == ''){
        alert('Please select date first.');
        return false;
    }else{
	var formdata = $('#requestBook').serialize();
	window.location.href = '<?php echo $this->request->webroot ?>orders/create?'+formdata+'&requestType='+$(this).attr('data-type');
    }    
});
    
</script> 

