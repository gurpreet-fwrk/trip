<style>
button[disabled] {
    cursor: not-allowed;
}
</style>

<section class="booking">

    <div class="container">

        <!--        <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
        <?php if (isset($_GET['step']) && $_GET['step'] == 2) { ?>
                                <a href="#step-2" type="button" class="btn btn-default btn-circle">1</a>
        <?php } else { ?>
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <?php } ?>
                            <p>Trip Info</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn <?php echo (isset($_GET['step']) && $_GET['step'] == 2) ? 'btn-primary' : 'btn-default'; ?> btn-circle">2</a>
                            <p>Payment</p>
                        </div>
        
                    </div>
                </div>-->

        <div class="row">
            <div class="col-sm-12">
                <div class="cell">
                    <ul class="nav nav-tabs no-border" role="tablist">
                        <?php if (isset($_GET['step']) && $_GET['step'] == 2) { ?>
                            <li role="presentation">
                                <a href="#profile" aria-controls="home" role="tab" data-toggle="tab" class="btn btn-circle btn-default" disabled>1</a>
                                <p>Trip Info</p>
                            </li>
                        <?php } else { ?>
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="btn btn-circle btn-default">1</a>
                                <p>Trip Info</p>
                            </li>
                        <?php } ?>
                        <li role="presentation" class="<?php echo (isset($_GET['step']) && $_GET['step'] == 2) ? 'active' : ''; ?>">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="btn btn-circle btn-default">2</a>
                            <p>Payment</p>
                        </li>
                    </ul>
                </div>
            </div><!--col-sm-12-end-->

            <div class="col-sm-9">


                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane <?php echo (!isset($_GET['step'])) ? 'active' : ''; ?>" id="home">

                        <div class="accordian_group book">
                            <!--- Start -->
                            <div class="accordian_wrapper">
                                <div class="accordian_head id">
                                    <div class="snd"><img src="<?php echo $this->request->webroot ?>images/website/booking1.png" /></div>
                                    <input type='radio' id='r17' name='occupation' value='Working'<?php echo (isset($_GET['requestType']) && $_GET['requestType'] == 'message') ? ' checked' : ''; ?> required />
                                    <a href="javascript:void(0)"> <span>Send a message</span>
                                        <p>Ask Local Expert for more detail</p>
                                    </a>
                                </div>
                                <div class="accordian_body">
                                    <form method="post" action="<?php echo $this->request->webroot ?>orders/chat/<?php echo $_GET['trip_id']; ?>/<?php echo $loggeduser['id']; ?>/<?php echo $trip['user']['id']; ?>">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-calendar" aria-hidden="true"></i> Trip date</label>
                                            <input class="form-control" type="text" id="datepick" name="trip_date" placeholder="Select Date" value="<?php echo $_GET['date']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-users" aria-hidden="true"></i> Guest(s)</label>
                                            <select class="form-control" name="guests">
                                                <?php for ($i = 1; $i <= $trip['travellers']; $i++) { ?>
                                                    <?php if ($i == $_GET['quantity']) { ?>
                                                        <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <span>Additional Options</span>
                                        <!--<div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Tourist SIM Card with Unlimited Data + FREE Call Credit </label>
                                        </div>-->
                                        <textarea class="form-control" rows="3" name="message" placeholder="Hi <?php echo $trip['user']['name'] ?>. Please confirm if you’re available for the trip (<?php echo date('d M Y', strtotime($_GET['date'])); ?> for <?php echo $_GET['quantity']; ?> guests), so I can make payment online.">Hi <?php echo $trip['user']['name'] ?>. Please confirm if you’re available for the trip (<?php echo date('d M Y', strtotime($_GET['date'])); ?> for <?php echo $_GET['quantity']; ?> guests), so I can make payment online.</textarea>

                                        <?php if ($loggeduser) { ?>
                                            <button type="submit" class="btn btn-default blue">Send a message</button>
                                        <?php } else { ?>
                                            <button type="button" data-toggle="modal" data-target=".loginmodal" class="btn btn-default blue">Send a message</button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <!--- End -->

                            <!--- Start -->
                            <div class="accordian_wrapper">
                                <div class="accordian_head id">
                                    <div class="snd"><img src="<?php echo $this->request->webroot ?>images/website/booking2.png" /></div>
                                    <input type='radio' id='r17' name='occupation' value='Working'<?php echo (isset($_GET['requestType']) && $_GET['requestType'] == 'book') ? ' checked' : ''; ?> required />
                                    <a href="javascript:void(0)"> <span>Book now</span>
                                        <p>Book now to reserve the tour.</p>
                                    </a>
                                </div>
                                <div class="accordian_body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-calendar" aria-hidden="true"></i> Trip date</label>
                                            <input class="form-control" type="text" id="datepickz" placeholder="Select Date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i class="fa fa-users" aria-hidden="true"></i> Guest(s)</label>
                                            <select class="form-control">
                                                <?php for ($i = 1; $i <= $trip['travellers']; $i++) { ?>
                                                    <?php if ($i == $_GET['quantity']) { ?>
                                                        <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <span>Additional Options</span>
                                        <!--<div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Tourist SIM Card with Unlimited Data + FREE Call Credit </label>
                                        </div>-->
                                        <?php
                                        $mps = array();
                                        foreach ($tripmeetingpoints as $mp) {
                                            if ($config_language == 'ar' && $mp['language'] == 'ar') {
                                                $mps[$mp['meeting_point_type']][] = $mp['meeting_point'];
                                            } elseif ($config_language == 'en' && $mp['language'] == 'ar') {

                                                $mps[$this->Text->changelanguage('ar', 'en', $mp['meeting_point_type'])][] = $this->Text->changelanguage('ar', 'en', $mp['meeting_point']);
                                            } elseif ($config_language == 'ar' && $mp['language'] == 'en') {
                                                $mps[$this->Text->changelanguage('en', 'ar', $mp['meeting_point_type'])][] = $this->Text->changelanguage('en', 'ar', $mp['meeting_point']);
                                            } else {
                                                $mps[$mp['meeting_point_type']][] = $mp['meeting_point'];
                                            }
                                        }
                                        //echo "<pre>"; print_r($mps); echo "</pre>";
                                        ?>

                                        <span>Please select your meeting point</span>
                                        <div class="panel-group meting" id="accordion" role="tablist" aria-multiselectable="true">
                                            <?php $j = 1; ?>
                                            <?php foreach ($mps as $key => $value) { ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="heading<?php echo $j; ?>">
                                                        <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $j; ?>" aria-expanded="true" aria-controls="collapse<?php echo $j; ?>"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $key; ?> </a> </h4>
                                                    </div>
                                                    <div id="collapse<?php echo $j; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <?php for ($i = 0; $i < count($value); $i++) { ?>
                                                                    <div class="radio-btn">
                                                                        <input type="radio" value="<?php echo $key . ', ' . $value[$i]; ?>" name="meetingpoint">
                                                                        <label for="bta" onclick><?php echo $value[$i]; ?></label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $j++; ?>
                                            <?php } ?>

                                        </div>
                                        <p class="help-block"><a href="#">Select Later</a></p>
                                        <button type="button" class="btn btn-default blue" id="pay-con">Continue</button>
                                    </form>
                                </div>
                            </div>
                            <!--- End -->
                        </div>


                    </div><!--home-->

                    <div role="tabpanel" class="tab-pane <?php echo (isset($_GET['step']) && $_GET['step'] == 2) ? 'active' : ''; ?>" id="profile">
                        <form action="<?php echo $this->request->webroot ?>orders/payment" method="post">
                        <div class="general">
                            <h3>General Information</h3>
                            <div class="dest">
                                <div class="form-group">
                                    <label for="exampleInputFirst">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputFirst" name="user[first_name]" value="<?php echo $userdata['first_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLast">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputLast" name="user[last_name]" value="<?php echo $userdata['last_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="user[email]" value="<?php echo $userdata['email']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputMobile">Mobile</label>
                                    <input type="number" class="form-control" id="exampleInputMobile" name="user[phone]" value="<?php echo $userdata['phone']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputGuests">Country of Passport</label>
                                    <select class="form-control" name="user[country]">
                                        <?php foreach ($countries as $country) { ?>
                                            <?php if ($country['name'] == $userdata['country']) { ?>
                                                <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <?php
                                if(isset($_GET['order_type'])){
                                    $order_type = 'update';
                                }else{
                                    $order_type = 'new';
                                }
                                ?>
                                <input type="hidden" name="order_type" value="<?php echo $order_type; ?>">
                                <?php if(isset($_GET['order_id'])){ ?>
                                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="general">
                            <h3>Pay with PayPal</h3>
                            <div class="dest pay">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="pay_agree" onchange="pay_agree()">I agree to Platour's T&Cs & Cancellation Policy
                                    </label>
                                </div>

                                <button type="submit" disabled="" style="background: none; border: 0;"><img src="<?php echo $this->request->webroot ?>images/website/paypal.png" /></button>

                            </div>
                        </div>
                        </form>
                    </div><!--profile-->
                </div>
            </div>
            <!--col-sm-9-->

            <div class="col-sm-3">
                <div class="guest">
                    <h3><?php echo (!empty($trip)) ? $trip['title_' . $config_language] : ''; ?></h3>
                    <div class="head">
                        <?php if ($trip['image'] != '') { ?>
                            <img src="<?php echo $this->request->webroot ?>images/trips/<?php echo $trip['image']; ?>">
                        <?php } else { ?>
                            <img src="<?php echo $this->request->webroot . 'images/website/no-image.png' ?>">
                        <?php } ?>
                    </div>
                    <div class="head_pic"><img src="<?php echo $this->request->webroot ?>/images/users/<?php echo ($trip['user']['image'] != '') ? $trip['user']['image'] : 'noimage.png' ?>" /><span><?php echo (!empty($trip['user'])) ? $trip['user']['name'] : ''; ?></span></div>
                    <ul>
                        <li>
                            <span>Guest(s) :</span>
                            <span><?php echo (isset($_GET['quantity'])) ? $_GET['quantity'] : 0; ?> person(s)</span>
                        </li>

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

                        <li>
                            <span>Trip cost :</span>
                            <?php if ($trip['pricing_type'] == 'basic') { ?>
                                <span><?php echo $trip['basic_price_per_person'] * $_GET['quantity']; ?>  THB</span>
                            <?php } elseif ($trip['pricing_type'] == 'basic') { ?>
                                <?php foreach ($tripdata['trip']['tripprices'] as $price) { ?>
                                    <?php if ($price['person'] == $_GET['quantity']) { ?>
                                        <span><?php echo $price['price_per_person'] * $_GET['quantity']; ?> THB</span>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </li>
                        <!--                    <li>
                                                <span>Booking fee + Tax : </span>
                                                <span>700.00 THB</span>
                                            </li>-->
                        <!--                    <li class="sml">
                                                <span>Book now &amp; Save:</span>
                                                <span>-325.50 THB</span>
                                            </li>-->
                        <li class="totl">
                            <span>Total price :</span>
                            <?php if ($trip['pricing_type'] == 'basic') { ?>
                                <span><?php echo $trip['basic_price_per_person'] * $_GET['quantity']; ?>  THB</span>
                                <p><?php echo 'Converted from ' . ($trip['basic_price_per_person'] * $_GET['quantity'] * $converted_currency) . ' ' . $config_currency; ?></p>
                            <?php } elseif ($trip['pricing_type'] == 'basic') { ?>
                                <?php foreach ($tripdata['tripprices'] as $price) { ?>
                                    <?php if ($price['person'] == $_GET['quantity']) { ?>
                                        <span><?php echo $price['price_per_person'] * $_GET['quantity']; ?> THB</span>
                                        <p><?php echo 'Converted from ' . ($price['price_per_person'] * $_GET['quantity'] * $converted_currency) . ' ' . $config_currency; ?></p>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </li>
                    </ul>

                    <span>Promo Code</span>
                    <form class="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default blue">Submit</button>
                    </form>

                    <div class="condt">
    <!--                    <span>Price Condition</span>-->
                        <?php if ($trip['include_exclude'] == 'all_inclusive') { ?>
                            <span><?php echo ($config_language == 'en') ? 'All inclusive' : 'الجميع مشمول'; ?></span>
                        <?php } elseif ($trip['include_exclude'] == 'food_excluded') { ?>
                            <span><?php echo ($config_language == 'en') ? 'Food Excluded' : 'الغذاء المستثنى'; ?></span>
                        <?php } elseif ($trip['include_exclude'] == 'all_excluded') { ?>
                            <span><?php echo ($config_language == 'en') ? 'Food, Transportation, Admission fee excluded' : 'الغذاء، النقل، رسوم القبول مستثناة'; ?></span>
                        <?php } ?>
    <!--                    <p>Travelers pay for their meal(s) during a trip.</p>-->
                    </div>
                </div>
            </div>
            <!--col-sm-3-->
        </div>
    </div>
</section>

<script>
    /*accordian*/
    $(document).ready(function () {
        $('.accordian_body').slideUp();

        var type = '<?php echo (isset($_GET['requestType'])) ? $_GET['requestType'] : ''; ?>';

        if (type == 'message') {
            $('.accordian_body').eq(0).slideDown();
        } else {
            $('.accordian_body').eq(1).slideDown();
        }
        $('.accordian_head').click(function () {
            $('.accordian_body').slideUp();
            if ($(this).next('.accordian_body').is(":visible")) {
                $('.accordian_body').slideUp();
            } else {
                $(this).next('.accordian_body').slideDown();
            }
        });
    });
</script> 

<script>
    var enableDays = [];
    $(function () {

        var selected_date = '<?php echo $_GET['date']; ?>';

        selected_date = selected_date.split('/');

        var availabilities = $.parseJSON('<?php echo json_encode($availabilities) ?>');

        for (i = 0; i < Object.keys(availabilities).length; i++) {
            avail = availabilities[i]['date'].split('/');
            enableDays.push(avail[0] + '-' + avail[1] + '-' + avail[2]);
            ;
        }

        function enableAllTheseDays(date) {
            var sdate = $.datepicker.formatDate('yy-m-dd', date)
            if ($.inArray(sdate, enableDays) != -1) {
                return [true];
            }
            return [false];
        }


        $("#datepick").datepicker({dateFormat: 'yy-m-dd', beforeShowDay: enableAllTheseDays}).datepicker('setDate', selected_date[0] + '-' + selected_date[1] + '-' + selected_date[2]);

        $("#datepickz").datepicker({dateFormat: 'yy-m-dd', beforeShowDay: enableAllTheseDays}).datepicker('setDate', selected_date[0] + '-' + selected_date[1] + '-' + selected_date[2]);
    });

    $(function () {
        /*$( "#datepickz" ).datepicker();*/
    });

    /********************************/

    $("#pay-con").click(function () {
        var value = $("input[name='meetingpoint']:checked").val();

        if (value != undefined) {
            $.ajax({
                url: "<?php echo $this->request->webroot ?>orders/ajaxAddMeetingpointToCart",
                data: {meetingpoint: value},
                method: 'post',
                success: function (response) {

                }
            });
        }

        $(".cell .nav-tabs li a[href='#profile']").trigger('click');

        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
    
    $('#pay_agree').click(function(){
        if($('#pay_agree').is(":checked"))   
            $('#pay_agree').parent().parent().next('button').prop("disabled", false);
        else
            $('#pay_agree').parent().parent().next('button').prop("disabled", true);
    });

</script>

