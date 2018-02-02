<section class="basic">
    <div class="second">
        <div class="container">
            <form>
                <div class="your_booking">

                    <?php //echo "<pre>"; print_r($orders); echo "</pre>"; ?>
                    <?php if(!empty($orders)){ ?>
                    <?php foreach($orders as $order){ ?>
                    <div class="view_fav">

                        <div class="show_data show_inbox">
                            <a href="" class="draft"><div class="camera_caption <?php echo $order['trip_status']; ?>"><span><?php echo ucwords($order['trip_status']); ?></span></div></a>
                            <div class="proceed">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="inbox_img"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($order['trip']['user']['image'] != '') ? $order['trip']['user']['image'] : 'noimage.png' ?>"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="inbox_desc">
                                            <h4><?php echo $order['trip']['title_'.$config_language]; ?></h4>
                                            <p><?php echo $order['trip']['summary_'.$config_language]; ?></p>
                                        </div>
                                        <hr>
                                        <div class="verify_code">
                                            <h4>Verification code: <i class="fa fa-question-circle" class="btn btn-primary" data-toggle="popover" data-content="Please provide the below code to the expert after trip completion."></i></h4>
                                            <h3 style="margin: 10px 0px;"><?php echo $order['verification_code']; ?></h3>
                                        </div>
                                    </div>
                                </div><!--row-->
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h3 class="inbox_title"><?php echo $order['trip']['user']['name']; ?></h3>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="abcd">
                                            <div class="col-sm-4">
                                                <div class="inbox_text">
                                                    <img src="<?php echo $this->request->webroot ?>images/website/loc.png">
                                                    <span><?php echo $order['trip']['location']['name_'.$config_language]; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="inbox_text">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <span><?php echo date('F d, Y', strtotime($order['trip_date'])); ?></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="inbox_text">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    <span><?php echo $order['guests']; ?> People</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--row-->
                                </div><!--col-sm-9-->
                            </div>

                        </div>
                    </div><!--view_fav-->
                    <?php } ?>
                    <?php }else{ ?>
                    No Bookings Found
                    <?php } ?>
                </div>
            </form>

        </div>
    </div>
</section>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover'
    });
});
</script>