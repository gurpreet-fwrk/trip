<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
        Trip
    </title>
    <link rel="icon" type="image/x-icon" href="<?php echo $this->request->webroot."images/website/logo-fav.png";?>" />

    <?= $this->Html->css( array('bootstrap.min', 'slick-theme', 'bootstrap-theme.min', 'slick', 'checkbox', 'style', 'custom/jquery-ui.min.css') ) ?>
    
    <?= $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery-ui.min.js', 'slick.min', 'jquery-session')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic,600italic,600"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <style>
/*        label.error{
            color: red;
            font-style: italic;
            font-size: 13px;
        }*/
	.message.success{
		background: #00b33c;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
	.message.error{
		background: #cc0000;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
         @keyframes pulse{
                from{
                        transform: scale3d(0.1, 0.1, 0.1);
                }
                50%{
                        transform: scale3d(1.05, 1.05, 1.05);
                }
                to{
                        transform: scale3d(0.1, 0.1, 0.1);
                }
         }

         @keyframes pulse-one{
                from{
                        transform: scale3d(1.05, 1.05, 1.05);
                }
                50%{
                        transform: scale3d(0.1, 0.1, 0.1);
                }
                to{
                        transform: scale3d(1.05, 1.05, 1.05);
                }
         }
         ._2G9Ry7uLWE8xGyg0Ueyndc {
            visibility: visible;
            opacity: 1;
            position: fixed;
            width: 100%;
            height: calc(100vh - 67px);
            top: 67px;
            background: #fff;
            z-index: 3000;
        }

        ._1FNksn-DOC2GvjPqw1ilJA {
            width: 60px;
            height: 60px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
        }

        .DA2lM5bvfdkZyFAb775Wh {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #e86a1a;
            opacity: 0.6;
            position: absolute;
            top: 0;
            left: 0;
            animation: pulse-one 2s infinite ease-in-out;
        }

        .r52LMBdnmQ_U7l8cHHUBu {
            animation-delay: -1s;
        }
         .r52LMBdnmQ_U7l8cHHUBu {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #e86a1a;
            opacity: 0.6;
            position: absolute;
            top: 0;
            left: 0;
            animation: pulse 2s infinite ease-in-out;
        }
	</style>

    <?php if($config_language == 'ar'){ ?>
    <style>
        *{
            text-align: right;
        }
    </style>
    <?php } ?>

    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <!-- Google Login -->
    <script>

    var googleUser = {};

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var profile = googleUser.getBasicProfile();
                var google_id = profile.getId();
                var full_name = profile.getName();
                var image = profile.getImageUrl();
                var g_email = profile.getEmail()
                var uid = '<?php echo $loggeduser["id"]; ?>';

                if (google_id != '' && uid == '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->request->webroot ?>users/gplogin",
                        data: {
                            id: profile.getId(),
                            name: profile.getName(),
                            first_name: profile.getGivenName(),
                            last_name: profile.getFamilyName(),
                            email: profile.getEmail(),
                            action: 'gplogin'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            //window.location.href = resdata.link;

                            if (data.isSuccess != 'true') {
                                //alert(data.msg);
                            } else {
                                location.reload();
                            }

                        },
                        error: function() {}

                    });
                }
            },
            function(error) {
                //alert(JSON.stringify(error, undefined, 2));
            });
    }


    var startApp = function() {
        gapi.load('auth2', function() {
            auth2 = gapi.auth2.init({
                client_id: '1014660450668-cq1oveoqtvdf1j9frhc55cl7oh69k30e.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
            });
            attachSignin(document.getElementById('customBtn'));
            attachSignin(document.getElementById('customBtn1'));
        });
    };
    </script>
    <!-- Google Login (End) -->
    
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-default main_header navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="<?php echo $this->request->webroot ?>" style="color:#fff;"><img src="<?php echo $this->request->webroot ?>/images/website/logo.png" /></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse topbar">
                <ul class="nav navbar-nav navbar-right header">
                    <li class="slt">
                        <select onchange="changeLanguage(this);">
                            <?php if($config_language == 'en'){ ?>
                            <option value="en" selected>English</option>
                            <?php }else{ ?>
                            <option value="en">English</option>
                            <?php } ?>

                            <?php if($config_language == 'ar'){ ?>
                            <option value="ar" selected>Arabic</option>
                            <?php }else{ ?>
                            <option value="ar">Arabic</option>
                            <?php } ?>
                        </select>
                    </li>
                    <li class="slt">
                        <select>
                            <option value="d" selected><?php echo $this->Text->lang('text_usd'); ?></option>
                            <option value="e"><?php echo $this->Text->lang('text_dollar'); ?></option>
                            <option value="f"><?php echo $this->Text->lang('text_euro'); ?></option>
                        </select>
                    </li>
                    <li class="tripbtn"><a href="<?php echo $this->request->webroot ?>trips"><span><?php echo $this->Text->lang('list_trip'); ?></span></a></li>
                    <li><a href="#"><?php $this->Text->lang('help_center', 1); ?></a></li>
                    <?php if(!$loggeduser){ ?>
                    <li><a href="#" data-toggle="modal" data-target=".loginmodal"><?php echo $this->Text->lang('text_login'); ?></a></li>
                    <li><a href="#" data-toggle="modal" data-target=".signupmodal"><?php echo $this->Text->lang('text_signup');; ?></a></li>
                    <?php }else{ ?>
                   
                    <li><a href="<?php echo $this->request->webroot ?>users/logout"><?php echo $this->Text->lang('text_logout'); ?></a></li>
                    
                    <?php } ?>
                    <?php if($loggeduser){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle account" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php if($loggeduser['image'] != ''){ ?>
                        <img src="<?php echo $this->request->webroot ?>images/users/<?php echo $loggeduser['image'] ?>" />
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot ?>images/users/noimage.png" />
                        <?php } ?>
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->request->webroot ?>users/edit/<?php echo $loggeduser['id']; ?>"><?php echo $this->Text->lang('text_edit_profile'); ?></a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!--/.nav-collapse --> 
        </div>
    </nav>
    <!-- Header (END) -->
<script>startApp();</script>



<!---->
<!--login modal start-->
<!---->
<div class="modal fade loginmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border:0px;">

       <div class="modal-body no-padding" style="overflow: hidden;border-radius: 5px;">
        <div class="row">
            <div class="col-sm-5">
                
                <form class="log" id="login-frm">
                    <div class="register">
                     <h2 style="margin:0px;">LOGO</h2>
                     <h3><?php $this->Text->lang('text_login', 1); ?></h3>
                     <a style="margin-bottom:10px;" class="omb_login"><img src="<?php echo $this->request->webroot ?>images/website/fb.png" /></a>
                     <a href="javascript:void(0)" id="customBtn"><img src="<?php echo $this->request->webroot ?>images/website/g.png" /></a>

                       

                     <span><?php echo $this->Text->lang('text_or'); ?></span>
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="alert alert-success" style="display:none"></div>
                        <div class="alert alert-info" style="display:none"><?php echo $this->Text->lang('text_authenticating'); ?></div>
                     <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $this->Text->lang('text_email'); ?>" name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $this->Text->lang('text_password'); ?>" name="password">
                    </div>
                    <button type="button" class="btn btn-primary btn-block start"><?php echo $this->Text->lang('text_getstarted'); ?></button>
                    <span class="now"><?php echo $this->Text->lang('text_dont_have_account'); ?><a href="#" data-toggle="modal" data-target=".signupmodal" data-dismiss="modal" style="color:#000;"><?php echo $this->Text->lang('text_signup'); ?></a></span>
                </div>
            </form>
        </div>
        <div class="col-sm-7">

            <div class="looking">
                <div class="pack">
                    <h3><?php echo ($config_language == 'en' ? 'Looking for a Holiday Package' : 'تبحث عن حزمة عطلة'); ?></h3>
                    <p><?php echo ($config_language == 'en' ? 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem' : 'أأبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="close cls" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>     
</div>
</div>
</div>
<!---->
<!--login modal end-->
<!---->

<!---->
<!--signup modal start-->
<!---->
<div class="modal fade signupmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border:0px;">

       <div class="modal-body no-padding" style="overflow: hidden;border-radius: 5px;">
        <div class="row">
            <div class="col-sm-5">
                <form class="log" id="signup-frm">
                    <div class="register signup">
                     <h2 style="margin:0px;">LOGO</h2>
                     <h3><?php echo $this->Text->lang('text_create_account'); ?></h3>
                     <a style="margin-bottom:10px;" class="omb_login"><img src="<?php echo $this->request->webroot ?>images/website/fb.png" /></a>
                     <a href="javascript:void(0)" id="customBtn1"><img src="<?php echo $this->request->webroot ?>images/website/g.png" /></a>
                     <span><?php echo $this->Text->lang('text_or'); ?></span>

                     <div class="alert-box" style="display: none;">
                     </div>

                     <div class="form-group" style="width:50%;float:left;">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $this->Text->lang('text_firstname'); ?>" name="first_name" id="first_name">
                    </div>
                    <div class="form-group" style="width:50%;float:left;">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $this->Text->lang('text_lastname'); ?>" name="last_name" id="last_name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $this->Text->lang('text_email'); ?>" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $this->Text->lang('text_epassword'); ?>" name="password1" id="password1">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $this->Text->lang('text_repassword'); ?>" name="password" id="password">
                    </div>
                    <button type="button" class="btn btn-primary btn-block start"><?php echo $this->Text->lang('text_create_account'); ?></button>
                    <span class="now"><?php echo $this->Text->lang('text_already_account'); ?> <a href="#" data-toggle="modal" data-target=".loginmodal" data-dismiss="modal" style="color:#000;"><?php echo $this->Text->lang('text_login_now'); ?></a></span>
                </div>
            </form>
        </div>
        <div class="col-sm-7">

            <div class="looking">
                <div class="pack">
                    <h3><?php echo ($config_language == 'en' ? 'Looking for a Holiday Package' : 'تبحث عن حزمة عطلة'); ?></h3>
                    <p><?php echo ($config_language == 'en' ? 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem' : 'أأبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد هوز أبجد'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="close cls" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>     
</div>
</div>
</div>
<!---->
<!--signup modal end-->
<!---->

<?= $this->fetch('content') ?>

<footer class="footer">

    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                <div class="bottom">
                    <h2><?php echo $this->Text->lang('text_contact_info'); ?></h2>
                    <span><?php echo ($config_language == 'en' ? 'Jalan Piit No 1 Sadang Serang Bandung' : 'جالان بيت نو 1 سادانغ سيرانغ باندونغ'); ?></span>
                    <a><?php echo $this->Text->lang('text_email'); ?>:contact@doaminname.com</a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="bottom social">
                    <h2><?php echo $this->Text->lang('text_connect'); ?></h2>
                    <span><?php echo $this->Text->lang('text_connect_follow'); ?></span>
                    <ul>
                        <li><a><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                        <li><a><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="bottom">
                    <h2><?php echo $this->Text->lang('text_newsletter'); ?></h2>
                    <span><?php echo $this->Text->lang('text_newsletter2'); ?>
                    </span>
                    <form class="form-inline subscribe">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" id="exampleInputAmount" placeholder="<?php echo $this->Text->lang('text_email'); ?>">
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary"><?php echo $this->Text->lang('button_subscribe'); ?></button>
              </form>
          </div>
      </div>

      <div class="col-sm-12">
        <div class="end">
            Copyright © 2017 <span style="color:#fff;">Domain Name</span>. Powered by <a style="color:#fff;">Future work technologies</a>
        </div>
    </div>

</div>
</div>

</footer>

    <!-- Login Modal (END) -->
    
    <script>
	

    $("#signup-frm button").click(function() {
        
        $.ajax({
            url: '<?php echo $this->request->webroot ?>users/ajaxSignup',
            data: $('#signup-frm').serialize(),
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                $('.alert-box').html(info_html).css('display', 'block');
            },
            success: function (response) {

                if(response){
                    $('.alert-box').html(response.msg).css('display', 'block');
                    if(response.isSucess == 'true'){
                        location.reload();
                    }
                }
            }
        });

    })

    $('#login-frm button').on("click", function () {

        $.ajax({
            url: '<?php echo $this->request->webroot; ?>users/login',
            data: $('#login-frm').serialize(),
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                $('.alert-danger').hide();
                $('.alert-success').hide();
                $('.alert-info').show();
            },
            success: function(d){
                
                if (d.response.isSucess == 'false') {
                    $('.alert-info').hide();
                    $('.alert-danger').html(d.response.msg);
                    $('.alert-danger').show();
                    
                } else {
                    $('.alert-danger').hide();
                    $('.alert-info').hide();
                    $('.alert-success').html(d.response.msg);
                    $('.alert-success').show();
                    
//                    console.log(d.response.data);
                    if(d.response.data.latitude == '' && d.response.data.role == 'trainer'){
                        window.location.href = "<?php echo $this->request->webroot ?>users/edit/"+d.response.data.id;
                    }else{
                        location.reload();
                    }
                }
            }
        });
    });
	</script>

    <!---Start-Facebook Login-->
    <script type="text/javascript">

        function testAPI() {
            FB.api('/me?fields=id,email,name,birthday,locale,age_range,gender,first_name,last_name,picture', function(response) {  
                data = {
                    myid : response,
                    action:'fblogin'
                }
                $.ajax({
                    url: '<?php echo $this->request->webroot ?>users/fblogin',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    success: function(resdata){
                        console.log(resdata);
                        //window.location.href = resdata.link;

                        if(resdata.isSuccess != 'true'){
                            alert(resdata.msg);
                        }else{
                            location.reload();
                        }
                    }
                });

            });

        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                testAPI();
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
                $('.omb_login').on('click', function (e) {
                    e.preventDefault();
                    FB.login(function(response) {
                        checkLoginState();
                    }, {scope: 'email'});
                });
            });
        })
    </script>
    <!--End-Facebook Login-->

    <script>
        function changeLanguage(sel){
            console.log(sel.value);

            var data = {
                language : sel.value
            }
            $.ajax({
                url: '<?php echo $this->request->webroot ?>users/changeLanguage',
                data: data,
                method: 'post',
                dataType: 'html',
                success: function(resdata){
                    location.reload();  
                }
            });

        }
    </script>
    <script type="application/javascript">
		
		
		$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 30) {
        $(".main_header").addClass("fix-header");
    } else {
        $(".main_header").removeClass("fix-header");
    }
});
	</script>

</body>
</html>
