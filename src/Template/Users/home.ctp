<section class="banner">
    <div class="full">
        <h1><?php echo $this->Text->lang('text_banner'); ?></h1>
        <div class="wrap-select">
            <div id="dd" class="wrapper-dropdown-3">
                <select>
                    <option value="d" selected>Where To GO</option>
                    <option value="e">USA</option>
                    <option value="f">Newyork</option>
                </select>
            </div>
        </div>
    </div>
</section>


<section class="trip-sec">
    <div class="container">
        <h2 class="heading">Trips Available on 
            <select>
                <option value="a">Tomorrow</option>
                <option value="b">Today</option>
                <option value="c">Upcoming</option>
                <option value="d" selected>Yesterday</option>
            </select>
        </h2>
<?php //echo "<pre>"; print_r($trips); echo "</pre>"; ?>
        <div class="row responsive" data-slick='{"slidesToShow": 3, "slidesToScroll": 3}'>

            
            <?php foreach($trips as $trip){ ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box">
                        <a href="<?php echo $this->request->webroot ?>trips/view/<?php echo base64_encode('view'.$trip['id']); ?>">
                            <?php if(!empty($trip['tripgallery'])){ ?>
                            <img src="<?php echo $this->request->webroot ?>images/trips/<?php echo $trip['tripgallery'][0]['file']; ?>" class="img-responsive center-block">
                            <?php }else{ ?>
                            <?php } ?>
                        </a>
                        <div class="content_box">
                            <h3><?php echo substr($trip['summary_'.$config_language], 0, 94) ?></h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup"><?php echo ($trip['hotel_pickup'] == 1) ? 'Free Hotel Pickup' : ''; ?></div>
                                    <span><?php echo $trip['transportation']['title_'.$config_language]; ?></span>
                                    <p>From <span> <?php echo (!empty($trip['tripprices'])) ? $trip['tripprices'][0]['total_price'] : $trip['basic_price_per_person']; ?> THB</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
<!--                                    <div class="time">10 hr</div>-->
                                    <ul>
                                        <?php
                                        $avg = $trip['avg_rating'];
                                        for($i = 0; $i<$avg; $i++){
                                        ?>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <?php
                                        }
                                        
                                        $not_avg = 5 - $trip['avg_rating'];
                                        for($i = 0; $i<$not_avg; $i++){
                                        ?>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <?php } ?>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span><?php echo $trip['location']['title_'.$config_language]; ?></span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!--trip-sec-->

<section class="trip-sec">
    <div class="container">
        <h2 class="heading">Suggestions For You</h2>

        <div class="row responsive" data-slick='{"slidesToShow": 3, "slidesToScroll": 3}'>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section><!--trip-sec-->

<section class="trip-sec">
    <div class="container">
        <h2 class="heading">Top Boating Experience</h2>

        <div class="row responsive" data-slick='{"slidesToShow": 3, "slidesToScroll": 3}'>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/user.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Lorem ipsum is simply dummy text..blaaa blaa blaa</h3>

                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="car_price">
                                    <div class="pickup">Free Hotel Pickup</div>
                                    <span>Private</span>
                                    <p>From <span>100 USD</span></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6" style="padding:0;">
                                <div class="rating">
                                    <div class="time">10 hr</div>
                                    <ul>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><span>(105)</span></li>
                                    </ul>


                                    <p>
                                        <span>Bangkok</span>
                                        <i class="">
                                            <img src="<?php echo $this->request->webroot ?>images/website/loc.png" class="img-responsive center-block">
                                        </i>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section><!--trip-sec-->


<section class="trip-sec testimonials">
    <div class="container">
        <h2 class="heading">Traveler's Review</h2>

        <div class="row responsive" data-slick='{"slidesToShow": 3, "slidesToScroll": 3}'>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/ra.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Michael</h3>
                            <span class="time">Paris</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                            <div class="rating">

                                <ul>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/rb.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Suzi</h3>
                            <span class="time">USA</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                            <div class="rating">

                                <ul>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/rc.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Sam</h3>
                            <span class="time">Italy</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="rating">

                                <ul>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/ra.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Michael</h3>
                            <span class="time">Paris</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                            <div class="rating">

                                <ul>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item">
                    <div class="main_box"> <a href="#"><img src="<?php echo $this->request->webroot ?>images/website/rb.jpg" class="img-responsive center-block"></a>
                        <div class="content_box">
                            <h3>Suzi</h3>
                            <span class="time">USA</span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                            <div class="rating">

                                <ul>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--testimonials-->


<script>
  /* Slik Slider Js Include Here */

  $('.responsive').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
]
});
</script>