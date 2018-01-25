<section class="basic">
    <div class="second">
        <div class="container">
            <div class="row"> <?php //echo "<pre>"; print_r($user); echo "</pre>";  ?>
                <div class="col-sm-4 col-md-3">
                    <div class="base base_b">
                        <!--small_slider-->
                        <div class="small_slider wishlist_slider">
                            <div class="browse">
                                <div class="profilepic"><img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user['image'] != '') ? $user['image'] : 'noimage.png' ?>" class="previewHolder"/></div>
                                <!--<div class="file-upload">
                                  <label for="upload" class="file-upload__label">Browse Photos</label>
                                  <input id="upload" class="file-upload__input" type="file" name="file-upload">
                                </div>-->
                            </div>
                            <h3><?php echo $user['name']; ?></h3>
                            <p class="no-margin">Member since <?php echo date('F Y', strtotime($user['created'])); ?></p>
                            <div class="overal_rating">
                                <p><span><?php echo ($user['avg_rating'] == '0') ? '0' : $user['avg_rating']; ?></span>/5</p>
                                <ul>
                                    <?php
                                    $avg = $user['avg_rating'];
                                    for ($i = 0; $i < $avg; $i++) {
                                        ?>
                                        <li><i class="fa fa-star active" aria-hidden="true"></i></li>
                                        <?php
                                    }

                                    $not_avg = 5 - $user['avg_rating'];
                                    for ($i = 0; $i < $not_avg; $i++) {
                                        ?>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <?php } ?>
                                </ul>
                                <p>Overall Rating</p>
                            </div>
                            <div class="view_edit"> <a href="#" class="left" style="color:#444;">View profile</a> <a href="<?php echo $this->request->webroot ?>users/edit/<?php echo base64_encode('user' . $user['id']); ?>" target="_blank" class="right" style="color:#498ebe;" >Edit profile</a> </div>
                            <div class="verification view_verify">
                                <h3>Verifications</h3>
                                <ul>
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/phone.png" />
                                            <?php if ($loggeduser['phone_verified'] == '1') { ?>
                                                <sub><i class="fa fa-check-circle" aria-hidden="true"></i></sub>
                                            </div>
                                            Phone number
                                        <?php } else { ?>
                                            </div>
                                            <a href="<?php echo $this->request->webroot ?>users/edit/<?php echo base64_encode('user' . $loggeduser['id']); ?>">+ add phone number</a>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/id.png" />
                                            <?php if ($loggeduser['id_number'] != '') { ?>
                                                <sub><i class="fa fa-check-circle" aria-hidden="true"></i></sub>
                                            </div>
                                            <span>ID Card</span>
                                        <?php } else { ?>
                                            </div>
                                            <a href="<?php echo $this->request->webroot ?>users/edit/<?php echo base64_encode('user' . $loggeduser['id']); ?>">+ add id card</a>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/email.png" />
                                            <?php if ($loggeduser['email_verified'] == '1') { ?>
                                                <sub><i class="fa fa-check-circle" aria-hidden="true"></i></sub>
                                            </div>
                                            <span>Email</span>
                                        <?php } else { ?>
                                            </div>
                                            <a href="<?php echo $this->request->webroot ?>users/edit/<?php echo base64_encode('user' . $loggeduser['id']); ?>">+ add email</a>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/acc.png" />
                                            <?php if ($loggeduser['account_number'] != '') { ?>
                                                <sub><i class="fa fa-check-circle" aria-hidden="true"></i></sub>
                                            </div>
                                            <span>Bank Account</span>
                                        <?php } else { ?>
                                            </div>
                                            <a href="<?php echo $this->request->webroot ?>users/edit/<?php echo base64_encode('user' . $loggeduser['id']); ?>">+ add bank account</a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="verification view_verify">
                                <ul class="earn">
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/earning.png" /></div>
                                        <a>Your earnings</a>
                                        <p>0.00</p>
                                    </li>
                                    <li>
                                        <div class="verifyicon"><img src="<?php echo $this->request->webroot ?>images/website/approved.png" /></div>
                                        <span>Approved Trips</span>
                                        <p>0</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="quick">
                                <h3>Quick links</h3>
                                <a href="<?php echo $this->request->webroot ?>users/availabilities" target="_blank">Manage Availability</a> <a href="<?php echo $this->request->webroot ?>trips" target="_blank">Listing Trips</a> </div>
                        </div>
                        <!--small_slider-->
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <form>
                        <div class="listing">
                            <div class="view_fav">
                                <h2>Notifications</h2>
                                <!--<span class="no_notify">You are currently have no incoming notification.</span>-->
                                <?php //echo "<pre>"; print_r($messages); echo "</pre>"; ?>
                                <?php if(!empty($messages)){ ?>
                                <?php foreach($messages as $message){ ?>
                                <a href="<?php echo $this->request->webroot ?>orders/chat/<?php echo $message['trip_id']; ?>/<?php echo $message['reciever']; ?>/<?php echo $message['sender']; ?>">
                                <div class="message<?php echo ($message['read_status'] == 0) ? ' msg_back' : ''; ?>">
                                    <h3><i class="fa <?php echo ($message['read_status'] == 0) ? ' fa-envelope-o' : 'fa-envelope-open-o'; ?>" aria-hidden="true"></i>Message <span><?php echo date('M d, Y', strtotime($message['created'])); ?></span> </h3>
                                    <p>You have a new message from <?php echo ucwords($message['sender_user']['name']); ?></p>
                                </div>
                                </a>
                                <?php } ?>
                                <?php }else{ ?>
                                <span class="no_notify">You are currently have no incoming notification.</span>
                                <?php } ?>
                            </div>
                            <div class="view_fav">
                                <h2>Inbox</h2>
                                <?php //echo "<pre>"; print_r($inbox); echo "</pre>"; ?>
                                <?php if(!empty($inbox)){ ?>
                                <?php foreach($inbox as $data){ ?>
                                <div class="show_data show_inbox"> <a href="" class="draft">
                                        <div class="camera_caption"><span>Proceed to payment</span></div>
                                    </a>
                                    <div class="proceed">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="inbox_img"><img src="<?php echo $this->request->webroot ?>images/users/<?php echo $data['trip']['user']['image']; ?>"></div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="inbox_desc">
                                                    <h4><?php echo $data['trip']['title_'.$config_language]; ?></h4>
                                                    <p><?php echo $data['trip']['summary_'.$config_language]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--row-->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h3 class="inbox_title"><?php echo $data['trip']['user']['name']; ?></h3>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="abcd">
                                                    <div class="col-sm-4">
                                                        <div class="inbox_text"> <img src="<?php echo $this->request->webroot ?>images/website/loc.png"> <span><?php echo $data['trip']['location']['name_'.$config_language]; ?></span> </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="inbox_text"> <i class="fa fa-calendar" aria-hidden="true"></i> <span><?php echo date('F d, Y', strtotime($data['created'])); ?></span> </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="inbox_text"> <i class="fa fa-users" aria-hidden="true"></i> <span><?php echo $data['trip']['travellers']; ?> Max Travelers</span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--row-->
                                        </div>
                                        <!--col-sm-9-->
                                    </div>
                                </div>
                                <?php } ?>
                                <?php }else{ ?>
                                <span class="no_notify">No Inbox Trips Found</span>
                                <?php } ?>
                            </div>
                            <div class="view_fav">
                                <h2>Your Wishlist</h2>
                                <div class="row">
                                    <?php if (!empty($user['wishlist'])) { ?>
                                        <?php foreach ($user['wishlist'] as $wishlist) { ?>
                                            <a href="<?php echo $this->request->webroot ?>trips/view/<?php echo base64_encode('view' . $wishlist['trip']['id']); ?>" target="_blank">
                                                <div class="col-sm-4">
                                                    <div class="show_data">
                                                        <div class="show_pic"> <img src="<?php echo ($wishlist['trip']['image'] != '') ? $this->request->webroot . "images/trips/" . $wishlist['trip']['image'] : $this->request->webroot . "images/website/no-image.png" ?>"/>
                                                            <div class="wish"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                                            <div class="show_text">
                                                                <h4><img src="<?php echo $this->request->webroot . 'images/website/loc.png'; ?>" /><span><?php echo $wishlist['trip']['location']['name_' . $config_language]; ?></span></h4>
                                                                <p>
                                                                    <?php
                                                                    $amount = 1;
                                                                    $from_Currency = urlencode('THB');
                                                                    $to_Currency = urlencode($config_currency);
                                                                    $get = file_get_contents("https://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");

                                                                    if ($from_Currency != $to_Currency) {
                                                                        $get = explode("<span class=bld>", $get);
                                                                        $get = explode("</span>", $get[1]);
                                                                        $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
                                                                    } else {
                                                                        $converted_currency = 1;
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if (!empty($wishlist['trip']['tripprices'])) {
                                                                        echo $config_currency . ' ' . number_format($wishlist['trip']['tripprices'][0]['price_per_person'] * $converted_currency, 2);
                                                                    } else {
                                                                        echo $config_currency . ' ' . number_format($wishlist['trip']['basic_price_per_person'] * $converted_currency, 2);
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <span>per person</span> </div>
                                                        </div>
                                                        <div class="show_subtext">
                                                            <p><?php echo $wishlist['trip']['title_' . $config_language]; ?></p>
                                                            <h4><img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($wishlist['trip']['user']['image'] != '') ? $wishlist['trip']['user']['image'] : 'noimage.png' ?>"/><span><?php echo $wishlist['trip']['user']['name']; ?></span>.</h4>
                                                        </div>
                                                        <?php if ($wishlist['trip']['hotel_pickup'] == 1) { ?>
                                                            <h5 class="building"><i class="fa fa-building-o" aria-hidden="true"></i>Free hotel pickup</h5>
        <?php } ?>
                                                    </div>
                                                    <!--show_data-->
                                                </div>
                                            </a>
                                            <!--col-sm-4-->
                                        <?php } ?>
                                    <?php } else { ?>
                                    <span class="no_notify">You don't have any wishlist.</span>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--col-sm-9-->
            </div>
        </div>
    </div>
</section>
