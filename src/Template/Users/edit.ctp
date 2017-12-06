<style>
    .error{
        color: red !important;
        font-weight: 400 !important;
        font-style: italic;
    }
</style>
<section class="basic">
  <div class="second">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="base base_b"> 
          
             <!--small_slider-->
              <div class="small_slider">
              <h3><?php echo $this->Text->lang('text_trip'); ?></h3>
              <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item">
                   <?php echo $this->Text->lang('text_lorem'); ?>
                   </div>
                  <div class="item">
                  <?php echo $this->Text->lang('text_lorem'); ?>
                   </div>
                  <div class="item active">
                  <?php echo $this->Text->lang('text_lorem'); ?>
                  </div>
                </div>
              
               </div>
               </div><!--small_slider-->
               
            <div class="tab">
              <h2><?php echo $this->Text->lang('text_list_trip'); ?></h2>
              <button class="tablinks active" onclick="openCity(event, 'General')" id="defaultOpen"><span>1</span><?php echo $this->Text->lang('tab_general'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Verification')"><span>2</span><?php echo $this->Text->lang('tab_verifications'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Settings')"><span>3</span><?php echo $this->Text->lang('tab_settings'); ?></button>
            </div>
          </div>
        </div>
        <div class="col-sm-9">

            <?= $this->Flash->render() ?>


          <!-- GENERAL TAB -->

          <?= $this->Form->create($user, ['id' => 'edit-form', 'enctype' => 'multipart/form-data']) ?>
            <div id="General" class="tabcontent">
              <div class="browse">
                <div class="profilepic">
                    <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user['image'] != '') ? $user['image'] : 'noimage.png' ?>" class="previewHolder"/>
                </div>
                <div class="file-upload">
                  <label for="upload" class="file-upload__label"><?php echo $this->Text->lang('text_image'); ?></label>
                  <?php echo $this->Form->control('image', ['id' => 'upload', 'type' => 'file', 'class' => 'file-upload__input', 'label' => false]); ?>
                </div>
              </div>
              <div class="photoss">
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_name'); ?><sup>*</sup></label>
                  </div>
                  <div class="col-sm-4">
                    <?php echo $this->Form->control('first_name', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                  <div class="col-sm-5">
                    <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_nickname'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('nickname', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_dob'); ?><sup>*</sup></label>
                  </div>
                  <?php echo $this->Form->control('dob', ['minYear' => date('Y') - 70, 'maxYear' => date('Y'),'class' => 'form-control', 'label' => false ]); ?>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_gender'); ?><sup>*</sup></label>
                  </div>
                  <div class="col-sm-9">
                    <?php
                    $gender = ['Male' => 'Male', 'Female' => 'Female'];
                    echo $this->Form->select('gender', $gender,['class' => 'form-control']);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_languages'); ?><sup>*</sup></label>
                  </div>
                  <div class="col-sm-9">

                    <?php

                    if($user->languages != ''){
                        $selected = explode(',',$user->languages);
                    }else{
                        $selected = array();
                    }
                    $languages = ['Hindi' => 'Hindi', 'English' => 'English', 'Arabic' => 'Arabic'];
                    echo $this->Form->select('languages', $languages,['class' => 'form-control js-example-basic-multiple', 'value' => $selected, 'multiple' => 'multiple']);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_video_url'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('video', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_address'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('address', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_country_passport'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" name="country">
                        <?php foreach ($countries as $country) { ?>
                            <?php if($country['name'] == $user->country){ ?>
                            <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_city'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('city', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputPassword3" class="control-label"><?php echo $this->Text->lang('text_about'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('about', ['class' => 'form-control', 'label' => false]); ?>
                  </div>
                </div>
                <h5 class="frequent"><?php echo $this->Text->lang('text_faq'); ?></h5>
                <div class="form-group">
                  <label for="exampleInputSummary"><?php echo $this->Text->lang('text_faq1'); ?></label>
                  <?php echo $this->Form->control('a1', ['class' => 'form-control', 'label' => false]); ?>
                  <?php echo $this->Form->control('q1', ['type' => 'hidden', 'value' => 'What\'s my hobby?', 'class' => 'form-control']); ?>
                  <p class="help-block right"></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputSummary"><?php echo $this->Text->lang('text_faq2'); ?></label>
                  <?php echo $this->Form->control('q2', ['type' => 'hidden', 'value' => 'Why do I become a local expert?', 'class' => 'form-control']); ?>
                    <?php echo $this->Form->control('a2', ['class' => 'form-control', 'label' => false]); ?>
                  <p class="help-block right"></p>
                </div>
                <div class="form-group">
                  <div class="col-sm-12 no-padding">
                    <?= $this->Form->button($this->Text->lang('text_submit'), ['class' => 'btn btn-primary blue right']) ?>
                  </div>
                </div>
              </div>
              <!--photos--> 
              <?= $this->Form->end() ?>
            </div>
            <!--General-->

            <!-- VERIFICATION TAB -->
            
            <div id="Verification" class="tabcontent">
              <div class="verify">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="box">
                      <div class="verif"><img src="<?php echo $this->request->webroot; ?>images/website/email.png" /></div>
                      <h3><?php echo $this->Text->lang('text_email'); ?></h3>
                      <span><?php echo $loggeduser['email']; ?></span>

                      <?php if($loggeduser['email_verified'] != '1'){ ?>
                      <button type="button" class="btn btn-primary blue" id="sendEmail"><?php echo $this->Text->lang('text_verify_email'); ?></button>
                      <div id="verifyEmail" style="display: none;">
                        <input type="text" name="code" placeholder="<?php echo $this->Text->lang('text_enter_verfication_code'); ?>" maxlength="6">
                        <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang('text_verify_email'); ?></button>
                        <h4 style="display: none;"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $this->Text->lang('text_verified'); ?></h4>
                      </div>

                      <?php }else{ ?>
                      <h4><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $this->Text->lang('text_verified'); ?></h4>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="box">
                      <div class="verif"><img src="<?php echo $this->request->webroot; ?>images/website/phone.png" /></div>
                      <h3><?php echo $this->Text->lang('text_phone'); ?></h3>
                      <?php if($loggeduser['phone_verified'] != '1'){ ?>
                      <div id="sendOtp">
                        <input type="text" name="mnumber" placeholder="<?php echo $this->Text->lang('text_phone'); ?>">
                        <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang('text_send_sms'); ?></button>
                      </div>
                      <div id="verifyOtp" style="display: none;">
                        <input type="text" name="otp" placeholder="Enter OTP">
                        <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang('text_verify_otp'); ?></button>
                        <h4 style="display: none;"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $this->Text->lang('text_verified'); ?></h4>
                      </div>
                      <?php }else{ ?>
                      <h4><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $this->Text->lang('text_verified'); ?></h4>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="box" id="id_card">
                      <div class="verif"><img src="<?php echo $this->request->webroot; ?>images/website/id.png" /></div>
                      <h3><?php echo $this->Text->lang("text_id_card"); ?></h3>
                      <form id="id_cardform" enctype="multipart/form-data">
                        <div class="link"> <span><?php echo $this->Text->lang("text_id_card_upload"); ?></span>
                          <div class="file-upload">
                            <label for="upload" class="file-upload__label">+ <?php echo $this->Text->lang("text_upload"); ?></label>
                            <input type="file" name="id_image" id="id_image" class="file-upload__input">
                          </div>
                        </div>  
                        <input type="text" name="id_number" id="id_number">  
                        <input type="hidden" name="uid" value="<?php echo $loggeduser['id']; ?>">
                        <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang("text_save"); ?></button>
                      </form>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="box" id="bank">
                      <div class="verif"><img src="<?php echo $this->request->webroot; ?>images/website/bank.png" /></div>
                      <h3><?php echo $this->Text->lang("text_bank_account"); ?></h3>
                      <form id="bank_form" enctype="multipart/form-data">
                      <div class="link"> <span><?php echo $this->Text->lang("text_bank_upload"); ?></span>
                        <div class="file-upload">
                          <label for="upload" class="file-upload__label">+ <?php echo $this->Text->lang("text_upload"); ?></label>
                          <input id="bank_image" class="file-upload__input" type="file" name="bank_image" >
                        </div>
                      </div>
                      <div class="acnt">
                        <select name="bank_name" id="bank_name" class="form-control">
                           <option value="">Select bank</option>
                           <option value="Krungsri">Krungsri</option>
                           <option value="BBL">BBL</option>
                           <option value="KBank">KBank</option>
                           <option value="SCB">SCB</option>
                           <option value="KTB">KTB</option>
                           <option value="CIMB">CIMB</option>
                           <option value="TMB">TMB</option>
                           <option value="UOB">UOB</option>
                           <option value="LH Bank">LH Bank</option>
                           <option value="SCBT">SCBT</option>
                           <option value="Thanachart">Thanachart</option>
                           <option value="GSB">GSB</option>
                           <option value="KK">KK</option>
                        </select>
                        <input type="text" name="bank_number" id="bank_number" placeholder="<?php echo $this->Text->lang('text_account_number'); ?>">
                      </div>
                      <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang("text_save"); ?></button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- SETTINGS TAB -->


            <div id="Settings" class="tabcontent">
              <div class="photoss photoset">

                <?php if($user['fb_id'] == ''){ ?>
                <div class="form-box">
                  <form id="email-frm">
                    <h3 class="subheadb"><?php echo $this->Text->lang('text_change_email'); ?></h3>
                    <div class="alert-box"></div>
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_email'); ?><sup>*</sup></label>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" value="<?php echo $user['email']; ?>" placeholder="" name="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-9 col-sm-3">
                        <button type="button" class="btn btn-primary blue right"><?php echo $this->Text->lang('text_save'); ?></button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="form-box">
                  <form id="cp-frm">
                    <h3 class="subheadb"><?php echo $this->Text->lang('text_change_password'); ?></h3>
                    <div class="alert-box"></div>
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_old_password'); ?><sup>*</sup></label>
                      </div>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="opassword" placeholder="" name="opassword">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_new_password'); ?><sup>*</sup></label>
                      </div>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password1" placeholder="" name="password1">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-3">
                        <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_confirm_password'); ?><sup>*</sup></label>
                      </div>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="" name="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-9 col-sm-3">
                        <button type="button" class="btn btn-primary blue right"><?php echo $this->Text->lang('text_save'); ?></button>
                      </div>
                    </div>
                  </form>
                </div>
                <?php }else{ ?>

                <div class="form-box">
                  
                  <h3 class="subheadb"><?php echo $this->Text->lang('text_set_password'); ?></h3>
                  <form id="sp-frm">
                    <div class="alert-box" style="display: none;"></div>
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_new_password'); ?><sup>*</sup></label>
                    </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="npassword" placeholder="" name="npassword">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label"><?php echo $this->Text->lang('text_confirm_password'); ?><sup>*</sup></label>
                    </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="password" placeholder="" name="password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3">
                      <button type="button" class="btn btn-primary blue right"><?php echo $this->Text->lang('text_save'); ?></button>
                    </div>
                  </div>
                  </form>
                </div> 

                <?php } ?>
                
                <div class="notsetting">
                  <h3 class="subheadb"><?php echo $this->Text->lang('text_notification_settings'); ?></h3>
                  <p><?php echo $this->Text->lang('text_notification_settings_des'); ?></p>

                  <div class="tog">
                    <span><?php echo $this->Text->lang('text_email'); ?>:<?php echo $user['email']; ?></span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <?php if($user['email_notifications'] == 1){ ?>
                        <input type="checkbox" id="checkbox1" onclick="onToggle()" checked="checked">
                        <?php }else{ ?>
                        <input type="checkbox" id="checkbox1" onclick="onToggle()">
                        <?php } ?>
                        <label for="checkbox1"> </label>
                      </div>
                    </div>
                  </div>

                  <h3 class="subheadb"><?php echo $this->Text->lang('text_connect_other'); ?></h3>

                  <ul class="others">
                    <li class="fconnect">
                      <?php if($user['fb_id'] == ''){ ?>
                      <a href="" class="omb_login2"><?php echo $this->Text->lang('text_connect_fb'); ?></a>
                      <?php }else{ ?>
                      <a href="javascript:void(0)"><?php echo $this->Text->lang('text_connected'); ?></a>
                      <?php } ?>
                    </li>
                  </ul>

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

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="alert"></div>
      </div>
    </div>
  </div>
</div>

<script>
    /*tab script*/
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


    /*******************************/
    /****       Validations     ****/
    /*******************************/
$().ready(function() {    
    $("#edit-form").validate({
        ignore: "",
        rules: {
            
            first_name: "required",
            last_name: "required",
            nickname: "required",
            dob: "required",
            country: {
                required: true
            },
            gender: "required",
            image: {
                extension: "jpg|jpeg|png"
            },
            city: "required",
            video: "required",
            address: "required",
            about: "required",
            a1: "required",
            a2: "required"/*,
            address: "required"*/
        },
        messages: {
            first_name: "<?php echo $this->Text->lang('error_field_required') ?>",
            last_name: "<?php echo $this->Text->lang('error_field_required') ?>",
            nickname: "<?php echo $this->Text->lang('error_field_required') ?>",
            dob: "<?php echo $this->Text->lang('error_field_required') ?>",
            country: "<?php echo $this->Text->lang('error_field_required') ?>",
            gender: "<?php echo $this->Text->lang('error_field_required') ?>",
            image: {
                extension: "<?php echo $this->Text->lang('error_image_ext') ?>"
            },
            city: "<?php echo $this->Text->lang('error_field_required') ?>",
            video: "<?php echo $this->Text->lang('error_field_required') ?>",
            address: "<?php echo $this->Text->lang('error_field_required') ?>",
            about: "<?php echo $this->Text->lang('error_field_required') ?>",
            a1: "<?php echo $this->Text->lang('error_field_required') ?>",
            a2: "<?php echo $this->Text->lang('error_field_required') ?>"
        }
    });
});


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#upload").change(function() {
  readURL(this);
});

/************************/

/******* Verify Email ********/

  $("#sendEmail").click(function(){
    $.post("<?php echo $this->request->webroot ?>users/verifications?action=send_mail", function(data, status){
          console.log(data);
          data = JSON.parse(data);

          $("#sendEmail").hide();
          //$("#verifyEmail .alertmsg .alert").html(data.msg);
          $("#myModal .alert").html('<div class="alert alert-success">'+data.msg+'</div>');
          $("#verifyEmail").show();
          $('#myModal').modal();
      });
  });

  $(document).delegate("#verifyEmail button", "click", function(){
    var code = $("input[name='code']").val();

    if(code == ''){
      alert('<?php echo $this->Text->lang("text_enter_verfication_code") ?>');
    }else{
      $.ajax({
        url: '<?php echo $this->request->webroot ?>users/verifications?action=verify_mail',
        data: {code: code},
        method: 'post',
        dataType: 'json',
        beforeSend: function(){
          $("#verifyEmail .alertmsg").html('<div class="alert alert-info"><?php echo $this->Text->lang("text_please_wait") ?></div>');
        },
        success: function(json){
          console.log(json);

          if(json.isSuccess == 'true'){
            $("#verifyEmail input, #verifyEmail button").hide();
            $("#verifyEmail h4").fadeIn("slow");
          }else{
            $("#myModal .alert").html('<div class="alert alert-danger">'+json.msg+'</div>');
            $('#myModal').modal();
          }
        } 
      });
    }
  }); 

  /************** Send OTP ***************/

  $("#sendOtp button").click(function(){
    var mobile_number = $("input[name='mnumber']").val();

    if(mobile_number == ''){
      alert('<?php echo $this->Text->lang('enter_mobile'); ?>');
    }else{
      $.ajax({
        url: '<?php echo $this->request->webroot ?>users/sendOtp',
        data: {mobile_number: mobile_number},
        method: 'post',
        dataType: 'json',
        // beforeSend: function(){
        //   $("#sendOtp .alert").show();
        // },
        success: function(json){
          if(json){
            $("#myModal .alert").html('<div class="alert alert-success"><?php echo $this->Text->lang("otp_sent"); ?></div>');
            $('#myModal').modal();
            $("#sendOtp").hide();
            $("#verifyOtp").show();
          }
        }
      });
    }
  });

  $("#verifyOtp button").click(function(){
    var otp = $("input[name='otp']").val();

    if(otp == ''){
      alert('Please Enter OTP');
    }else{
      $.ajax({
        url: '<?php echo $this->request->webroot ?>users/verifyOtp',
        data: {otp: otp},
        method: 'post',
        dataType: 'json',
        beforeSend: function(){
          $("#verifyOtp .alertmsg").html('<div class="alert alert-info">Validating..</div>');
          $("#myModal .alert").html('<div class="alert alert-info">Validating..</div>');
          $('#myModal').modal();
        },
        success: function(json){
          console.log(json);

          if(json.isSuccess == 'true'){
            //$("#verifyOtp .alertmsg").html('<div class="alert alert-success">'+json.msg+'</div>');
            $("#myModal .alert").html('<div class="alert alert-success">'+json.msg+'</div>');
            $("#verifyOtp input, #verifyOtp button").hide();

            $("#verifyOtp h4").fadeIn("slow");
          }else{
            //$("#verifyOtp .alertmsg").html('<div class="alert alert-danger">'+json.msg+'</div>');
            $("#myModal .alert").html('<div class="alert alert-danger">'+json.msg+'</div>');
          }
        } 
      });
    }
  });


  /******* ID card *********/

  $("#id_card button").click(function(){
    var form_data = new FormData(document.getElementById("id_cardform"));
    form_data.append("label", "WEBUPLOAD");

    if( $('#id_image').val() == "" || $('#id_number').val() == ""){
      $("#myModal .alert").html('<div class="alert alert-danger"><?php echo $this->Text->lang('error_fill_fields'); ?></div>');
      $('#myModal').modal();
    }else{

      $.ajax({
        url: "<?php echo $this->request->webroot ?>users/verifications?action=id_card",
        type: "POST",
        data: form_data,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        beforeSend: function() {
          $("#myModal .alert").html('<div class="alert alert-info"><?php echo $this->Text->lang("text_please_wait"); ?></div>');
          $('#myModal').modal();
        },
      }).done(function( data ) {
        console.log(data);

        data = JSON.parse(data);

        if(data.isSuccess == 'true'){
          $("#myModal .alert").html('<div class="alert alert-success">'+data.msg+'</div>');
          $('#myModal').modal();
          $("#id_card input").val('');
        }else{
          $("#myModal .alert").html('<div class="alert alert-danger">'+data.msg+'</div>');
          $('#myModal').modal();
        }
        //Perform ANy action after successfuly post data

      });
    } 
  }); 

  /******* ID card (END) *********/

    /******* Bank Account *********/

  $("#bank button").click(function(){
    var form_data = new FormData(document.getElementById("bank_form"));
    form_data.append("label", "WEBUPLOAD");

    if( $('#bank_image').val() == "" || $('#bank_number').val() == "" || $('#bank_name').val() == ""){
      $("#myModal .alert").html('<div class="alert alert-danger"><?php echo $this->Text->lang('error_fill_fields'); ?></div>');
      $('#myModal').modal();
    }else{

      $.ajax({
        url: "<?php echo $this->request->webroot ?>users/verifications?action=bank",
        type: "POST",
        data: form_data,
        processData: false,  // tell jQuery not to process the data
        contentType: false   // tell jQuery not to set contentType
      }).done(function( data ) {
        console.log(data);

        data = JSON.parse(data);

        if(data.isSuccess == 'true'){
          $("#myModal .alert").html('<div class="alert alert-success">'+data.msg+'</div>');
          $('#myModal').modal();
          $("#bank form").html('');
        }else{
          $("#myModal .alert").html('<div class="alert alert-danger">'+data.msg+'</div>');
          $('#myModal').modal();
        }
        //Perform ANy action after successfuly post data

      });
    } 
  }); 

  /******* Bank Account (END) *********/

  $('#id_image').change(function() {
    var file = $('#id_image')[0].files[0].name;
    $("#id_cardform span").html(file);
  });

  $('#bank_image').change(function() {
    var file = $('#bank_image')[0].files[0].name;
    $("#bank_form span").html(file);
  });

  /******* Change Password *******/
  var cpform1 = jQuery("#cp-frm").validate({   
  // errorClass: "my-error-class",
      validClass: "my-valid-class", 
          rules: {
            opassword: "required",
            password1: "required",
            password: {
              equalTo: "#password1"
            },
          },
          messages: {
            opassword: "<?php echo $this->Text->lang('error_field_required') ?>",
            password1: "<?php echo $this->Text->lang('error_field_required') ?>",
            password: {
              equalTo: "<?php echo $this->Text->lang('error_new_confirm_pass') ?>"
            },
          }
      });


  $("#cp-frm button").click(function() {
        if(cpform1.form()){
             $.ajax({
              url: '<?php echo $this->request->webroot ?>users/ajaxedit?action=change_password',
              data: $('#cp-frm').serialize(),
              method: 'post',
              dataType: 'json',
              beforeSend: function(){ 
                  // var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                  // $('.alert-box').html(info_html).css('display', 'block');
              },
              success: function (response) {

                  if(response.isSuccess == 'true'){
                      $('#cp-frm .alert-box').html('<div class="alert alert-success">'+response.msg+'</div>').css('display', 'block');
                  }else{
                      $('#cp-frm .alert-box').html('<div class="alert alert-danger">'+response.msg+'</div>').css('display', 'block');
                  }

                  $('#cp-frm .alert-box').delay(3000).fade();
              }
        });
        }else{
          return false;
        }
  });      

/**********************/


/******* Change Email *******/
  var editaddressform = jQuery("#email-frm").validate({   
   //errorClass: "my-error-class",
      validClass: "my-valid-class", 
          rules: {
            email: "required"
          },
          messages: {
            email: "<?php echo $this->Text->lang('error_field_required') ?>"
          }
      });


  $("#email-frm button").click(function() {
        if(editaddressform.form()){
             $.ajax({
              url: '<?php echo $this->request->webroot ?>users/ajaxedit?action=email',
              data: $('#email-frm').serialize(),
              method: 'post',
              dataType: 'json',
              beforeSend: function(){ 
                  // var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                  // $('.alert-box').html(info_html).css('display', 'block');
              },
              success: function (response) {

                  if(response.isSuccess == 'true'){
                      $('#email-frm .alert-box').html('<div class="alert alert-success">'+response.msg+'</div>').css('display', 'block');
                  }else{
                      $('#email-frm .alert-box').html('<div class="alert alert-danger">'+response.msg+'</div>').css('display', 'block');
                  }

                  $('#email-frm .alert-box').delay(3000).fadeOut();
              }
        });
        }else{
          return false;
        }
  });      

  function onToggle() {
    // check if checkbox is checked
    if (document.querySelector('#checkbox1').checked) {
      // if checked
      var notify = 1;
    } else {
      // if unchecked
      var notify = 0;
    }

    $.ajax({
          url: '<?php echo $this->request->webroot ?>users/ajaxedit?action=email_notification',
          data: {email_notifications: notify},
          method: 'post',
          dataType: 'json',
          beforeSend: function(){ 
              // var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
              // $('.alert-box').html(info_html).css('display', 'block');
          },
          success: function (response) {
          }
    });



  }

  /******* Change Password *******/
  var cpform = jQuery("#sp-frm").validate({   
   //errorClass: "my-error-class",
      validClass: "my-valid-class", 
          rules: {
            npassword: "required",
            password: {
              equalTo: "#npassword"
            },
          },
          messages: {
            npassword: "<?php echo $this->Text->lang('error_enter_password') ?>",
            password: {
              equalTo: "<?php echo $this->Text->lang('error_new_confirm_pass') ?>"
            },
          }
      });


  $("#sp-frm button").click(function() {
        if(cpform.form()){
             $.ajax({
              url: '<?php echo $this->request->webroot ?>users/ajaxedit?action=set_password',
              data: $('#cp-frm').serialize(),
              method: 'post',
              dataType: 'json',
              beforeSend: function(){ 
                  // var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                  // $('.alert-box').html(info_html).css('display', 'block');
              },
              success: function (response) {

                  if(response.isSuccess == 'true'){
                      $('#sp-frm .alert-box').html('<div class="alert alert-success">'+response.msg+'</div>').css('display', 'block');
                  }else{
                      $('#sp-frm .alert-box').html('<div class="alert alert-danger">'+response.msg+'</div>').css('display', 'block');
                  }

                  $('#sp-frm .alert-box').delay(3000).fade();
              }
        });
        }else{
          return false;
        }
  });      

/**********************/


</script>



<!---Start-Facebook Login-->
    <script type="text/javascript">

        function testAPI2() {
            FB.api('/me?fields=id,email,name,birthday,locale,age_range,gender,first_name,last_name,picture', function(response) {  
                data = {
                    myid : response,
                    action:'fblogin'
                }
                $.ajax({
                    url: '<?php echo $this->request->webroot ?>users/fbconnect',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    success: function(resdata){
                        console.log(resdata);
                        if(resdata.isSuccess == 'true'){
                            $('.omb_login2').html('Connected');
                        }
                    }
                });

            });

        }

        function checkLoginState2() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback2(response);
            });
        }

        function statusChangeCallback2(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                testAPI2();
            } else {
                console.log('Please log ') ;
            }
        }

        $(document).ready(function(){
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1889325091081949',
                    cookie     : true,  
                    xfbml      : true, 
                    version    : 'v2.10' 
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            $(function() {
                $('.omb_login2').on('click', function (e) {
                    e.preventDefault();
                    FB.login(function(response) {
                        checkLoginState2();
                    }, {scope: 'email'});
                });
            });
        })
    </script>
    <!--End-Facebook Login-->