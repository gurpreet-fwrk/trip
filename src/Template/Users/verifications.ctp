<section class="trip-sec" style="margin-top: 66px;">
    <div class="container">
        <div class="row">
        	<div class="col-xs-6 col-md-offset-3">
        		<div class="col-xs-6">
	            	<h2>Email</h2>
	            	<?php if($loggeduser['email_verified'] != '1'){ ?>
            		<button type="button" class="btn btn-warning" id="sendEmail"><?php echo $this->Text->lang('text_verify_email'); ?></button>
	            	<div id="verifyEmail" style="display: none;">
	            		<div class="alertmsg"><div class="alert alert-success"></div></div>
	            		<input type="text" name="code" placeholder="<?php echo $this->Text->lang('text_enter_verfication_code'); ?>">
	            		<button type="button" class="btn btn-warning"><?php echo $this->Text->lang('text_verify_email'); ?></button>
	            	</div>
	            	<?php }else{ ?>
	            	<div class="alert alert-success"><?php echo $this->Text->lang('text_verified'); ?></div>
	            	<?php } ?>
	            </div>
	            <div class="col-xs-6">
	            	<h2>Phone</h2>
	            	<?php if($loggeduser['phone_verified'] != '1'){ ?>
	            	<div id="sendOtp">
	            		<div class="alert alert-info" style="display: none;"><?php echo $this->Text->lang('text_please_wait'); ?></div>
	            		<input type="text" name="mnumber" value="8950778851">
	            		<button type="button" class="btn btn-warning">Send SMS</button>
	            	</div>
	            	<div id="verifyOtp" style="display: none;">
	            		<div class="alertmsg"><div class="alert alert-success"><?php echo $this->Text->lang('otp_sent'); ?></div></div>
	            		<input type="text" name="otp" placeholder="Enter OTP">
	            		<button type="button" class="btn btn-warning"><?php echo $this->Text->lang('text_verify_otp'); ?></button>
	            	</div>
	            	<?php }else{ ?>
	            	<div class="alert alert-success"><?php echo $this->Text->lang('text_verified'); ?></div>
	            	<?php } ?>
	            </div>
	            <br>
	            <hr>
	            <br>
	            <div class="col-xs-6">
	            	<div id="id_card">
	            		<h2>ID Card</h2>
	            		<div class="alertmsg"></div>
	            		<form id="id_cardform" enctype="multipart/form-data">
		            		<input type="file" name="id_image" id="id_image" required>
		            		<input type="text" name="id_number" id="id_number" required>
		            		<input type="hidden" name="uid" value="<?php echo $loggeduser['id']; ?>">
		            		<button type="button" class="btn btn-warning">SAVE</button>
	            		</form>
	            	</div>
	            </div>

	            <div class="col-xs-6">
	            	<div id="bank">
	            		<h2>Bank Details</h2>
	            		<div class="alertmsg"></div>
	            		<form id="bank_form" enctype="multipart/form-data">
		            		<input type="file" name="bank_image" id="bank_image" required>
		            		<select name="bank_name">
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
		            		<input type="text" name="bank_number" id="bank_number" required>
		            		<input type="hidden" name="uid" value="<?php echo $loggeduser['id']; ?>">
		            		<button type="button" class="btn btn-warning">SAVE</button>
	            		</form>
	            	</div>
	            </div>	
            </div>
        </div>
    </div>
</section>   

<script>
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
				beforeSend: function(){
					$("#sendOtp .alert").show();
				},
				success: function(json){
					if(json){
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
				},
				success: function(json){
					console.log(json);

					if(json.isSuccess == 'true'){
						$("#verifyOtp .alertmsg").html('<div class="alert alert-success">'+json.msg+'</div>');
						$("#verifyOtp input, #verifyOtp button").hide();
					}else{
						$("#verifyOtp .alertmsg").html('<div class="alert alert-danger">'+json.msg+'</div>');
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
			$("#id_card .alertmsg").html('<div class="alert alert-danger"><?php echo $this->Text->lang('error_fill_fields'); ?></div>');
		}else{

			$.ajax({
				url: "<?php echo $this->request->webroot ?>users/verifications?action=id_card",
				type: "POST",
				data: form_data,
				processData: false,  // tell jQuery not to process the data
				contentType: false   // tell jQuery not to set contentType
			}).done(function( data ) {
				console.log(data);

				data = JSON.parse(data);

				if(data.isSuccess == 'true'){
					$("#id_card .alertmsg").html('<div class="alert alert-success">'+data.msg+'</div>');
					$("#id_card form").html('');
				}else{
					$("#id_card .alertmsg").html('<div class="alert alert-danger">'+data.msg+'</div>')
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
			$("#bank .alertmsg").html('<div class="alert alert-danger"><?php echo $this->Text->lang('error_fill_fields'); ?></div>');
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
					$("#bank .alertmsg").html('<div class="alert alert-success">'+data.msg+'</div>');
					$("#bank form").html('');
				}else{
					$("#bank .alertmsg").html('<div class="alert alert-danger">'+data.msg+'</div>')
				}
				//Perform ANy action after successfuly post data

			});
		}	
	});	

	/******* Bank Account (END) *********/


	/******* Verify Email ********/

	$("#sendEmail").click(function(){
		$.post("<?php echo $this->request->webroot ?>users/verifications?action=send_mail", function(data, status){
	        console.log(data);
	        data = JSON.parse(data);

	        $("#sendEmail").hide();
	        $("#verifyEmail .alertmsg .alert").html(data.msg);
	        $("#verifyEmail").show();
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
						$("#verifyEmail .alertmsg").html('<div class="alert alert-success">'+json.msg+'</div>');
						$("#verifyEmail input, #verifyEmail button").hide();
					}else{
						$("#verifyEmail .alertmsg").html('<div class="alert alert-danger">'+json.msg+'</div>');
					}
				}	
			});
		}
	});	
		
	/******* Verify Email ********/
</script>        