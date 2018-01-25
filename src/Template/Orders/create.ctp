<section class="booking">

    <div class="container">

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Trip Info</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                    <p>Payment</p>
                </div>

            </div>
        </div>

        <div class="col-sm-9">
            <div class="row setup-content" id="step-1">
                <div class="accordian_group book">
                    <!--- Start -->
                    <div class="accordian_wrapper">
                        <div class="accordian_head id">
                            <div class="snd"><img src="<?php echo $this->request->webroot ?>images/website/booking1.png" /></div>
                            <input type='radio' id='r17' name='occupation' value='Working' required />
                            <a href="javascript:void(0)"> <span>Send a message</span>
                                <p>Ask Local Expert for more detail</p>
                            </a>
                        </div>
                        <div class="accordian_body">
                            <form method="post" action="<?php echo $this->request->webroot ?>orders/chat/<?php echo $_GET['trip_id']; ?>/<?php echo $loggeduser['id']; ?>/<?php echo $trip['user']['id']; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-calendar" aria-hidden="true"></i> Trip date</label>
                                    <input class="form-control" type="text" id="datepick" placeholder="Select Date" value="<?php echo $_GET['date']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fa fa-users" aria-hidden="true"></i> Guest(s)</label>
                                    <select class="form-control">
                                   	<?php for($i=1;$i<=$trip['travellers'];$i++){ ?>
                                    <?php if($i == $_GET['quantity']){ ?>
                                    <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                    <?php }else{ ?>
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
                                
                                <?php if($loggeduser){ ?>
                                <button type="submit" class="btn btn-default blue">Send a message</button>
                                <?php }else{ ?>
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
                            <input type='radio' id='r17' name='occupation' value='Working' required />
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
                                   	<?php for($i=1;$i<=$trip['travellers'];$i++){ ?>
                                    <?php if($i == $_GET['quantity']){ ?>
                                    <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                    <?php }else{ ?>
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
                                <span>Please select your meeting point</span>
                                <div class="panel-group meting" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="fa fa-bus" aria-hidden="true"></i> BTS Station </a> </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio-btn">
                                                        <input type="radio" value="value-1" id="bta" name="bts">
                                                        <label for="bta" onclick>Bangkok</label>
                                                    </div>
                                                    <div class="radio-btn">
                                                        <input type="radio" value="value-2" id="btb" name="bts">
                                                        <label for="btb" onclick>Ayutthaya</label>
                                                    </div>
                                                    <div class="radio-btn">
                                                        <input type="radio" value="value-3" id="btc" name="bts">
                                                        <label for="btc" onclick>Chiang Mai</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="fa fa-building" aria-hidden="true"></i> Hotel Pickup(Bangkok) </a> </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputHotel" placeholder="Hotel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <i class="fa fa-bus" aria-hidden="true"></i> MRT Station </a> </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio-btn">
                                                        <input type="radio" value="value-4" id="mrta" name="mrt">
                                                        <label for="mrta" onclick>Bangkok</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-bus" aria-hidden="true"></i> Railway Station(Bangkok) </a> </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="radio-btn">
                                                        <input type="radio" value="value-4" id="raila" name="rail">
                                                        <label for="raila" onclick>Bangkok</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <p class="help-block"><a href="#">Select Later</a></p>
                                <button type="submit" class="btn btn-default blue">Continue</button>
                            </form>
                        </div>
                    </div>
                    <!--- End -->
                </div>

            </div>
            <!--step1-->

            <div class="row setup-content" id="step-2">
                <div class="general">
                    <h3>General Information</h3>
                    <form class="dest">
                        <div class="form-group">
                            <label for="exampleInputFirst">First Name</label>
                            <input type="text" class="form-control" id="exampleInputFirst">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLast">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputLast">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input type="number" class="form-control" id="exampleInputMobile">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputGuests">Country of Passport</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                    </form>
                </div>

                <div class="general">
                    <h3>Pay with PayPal</h3>
                    <form class="dest pay">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">I agree to Platour's T&Cs & Cancellation Policy
                            </label>
                        </div>

                        <a href="#"><img src="images/paypal.png" /></a>

                    </form>
                </div>

            </div>
            <!--step2-->

        </div>
        <!--col-sm-9-->

        <div class="col-sm-3">
            <div class="guest">
                <h3>Old Town Walking Tour &amp; Local Food</h3>
                <div class="head"><img src="images/log.png"></div>
                <div class="head_pic"><img src="images/logo.png"><span>Platour Local Expert</span></div>
                <ul>
                    <li>
                        <span>Guest(s) :</span>
                        <span>2 person(s)</span>
                    </li>
                    <li>
                        <span>Trip cost :</span>
                        <span>3,500.00 THB</span>
                    </li>
                    <li>
                        <span>Booking fee + Tax : </span>
                        <span>700.00 THB</span>
                    </li>
                    <li class="sml">
                        <span>Book now &amp; Save:</span>
                        <span>-325.50 THB</span>
                    </li>
                    <li class="totl">
                        <span>Total price :</span>
                        <span>4,073.50 THB </span>
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
                    <span>Price Condition</span>
                    <span>Food excluded</span>
                    <p>Travelers pay for their meal(s) during a trip.</p>
                </div>

            </div>
        </div>
        <!--col-sm-3-->

    </div>
</section>

<script>	
/*accordian*/
$(document).ready(function(){    
$('.accordian_body').slideUp();
 $('.accordian_body').eq(0).slideDown();
  
$('.accordian_head').click(function(){    $('.accordian_body').slideUp();          if($(this).next('.accordian_body').is(":visible")){      $('.accordian_body').slideUp();     }else{      $(this).next('.accordian_body').slideDown();     }    });   });
</script> 

<script>
var enableDays = [];
  $( function() {
  
  	var selected_date = '<?php echo $_GET['date']; ?>';
	
	selected_date = selected_date.split('/');
	
	var availabilities = $.parseJSON('<?php echo json_encode($availabilities) ?>');
	
    for(i=0; i<Object.keys(availabilities).length; i++){
    	avail = availabilities[i]['date'].split('/');
	        enableDays.push(avail[0]+'-'+avail[1]+'-'+avail[2]);;
    }

    function enableAllTheseDays(date) {
        var sdate = $.datepicker.formatDate( 'yy-m-dd', date)
        if($.inArray(sdate, enableDays) != -1) {
            return [true];
        }
        return [false];
    }
	
  
    $( "#datepick" ).datepicker({dateFormat: 'yy-m-dd', beforeShowDay: enableAllTheseDays}).datepicker('setDate', selected_date[0]+'-'+selected_date[1]+'-'+selected_date[2]);
	
	$( "#datepickz" ).datepicker({dateFormat: 'yy-m-dd', beforeShowDay: enableAllTheseDays}).datepicker('setDate', selected_date[0]+'-'+selected_date[1]+'-'+selected_date[2]);
  } );

  $( function() {
    /*$( "#datepickz" ).datepicker();*/
  } );
</script>

<script>
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>