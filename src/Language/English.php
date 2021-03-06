<?php
namespace App\Language;

/**
* 
*/
class English{

	function get($text){

		$lang = array();

		/** Header **/

		$lang['list_trip']						=	'List Your Trip';
		$lang['help_center']					=	'Help Center';
		$lang['text_login']						=	'Login';
		$lang['text_login_now']					=	'Login now';
		$lang['text_signup']					=	'Signup Now';
		$lang['text_logout']					=	'Logout';
		$lang['text_submit']					=	'Submit';
		$lang['text_usd']						=	'USD';
		$lang['text_dollar']					=	'Dollar';
		$lang['text_euro']						=	'Euro';

		$lang['text_or']						=	'Or';
		$lang['text_authenticating']			=	'Authenticating...';

		$lang['text_name']						=	'Name';
		$lang['text_firstname']					=	'First Name';
		$lang['text_lastname']					=	'Last Name';
		$lang['text_email']						=	'Email';
		$lang['text_password']					=	'Password';
		$lang['text_epassword']					=	'Enter Password';
		$lang['text_repassword']				=	'Re-enter Password';
		$lang['text_getstarted']				=	'Get Started';
		$lang['text_dont_have_account']			=	'Don\'t have an account?';
		$lang['text_create_account']			=	'Create An Account';
		$lang['text_already_account']			=	'Already have an account';

		$lang['text_edit_profile']				=	'Edit Profile';

		/** Header (End) **/

		/** Footer **/

		$lang['text_contact_info']				=	'Contact Info';

		$lang['text_connect']					=	'Connect With Us';
		$lang['text_connect_follow']			=	'Connect and follow us on social Media';

		$lang['text_newsletter']				=	'Newsletter';
		$lang['text_newsletter2']				=	'Subscribe To Our Newsletter.We Won\'t Spam';
		$lang['button_subscribe']				=	'Subscribe';

		/** Footer (End) **/

		$lang['text_banner']					=	'find your special tour today';
		$lang['text_save']						=	'SAVE';
                $lang['text_next']						=	'NEXT';

		/*** Validations ***/

		$lang['error_username']					=	'Please enter your username!';
		$lang['error_password']					=	'Please enter your password!';
		$lang['error_login_credentials']		=	'Wrong username && password! please try again!';
		$lang['success_login']					=	'Logged In successfully';
		$lang['enter_mobile']					=	'Please Enter Mobile Number';
		$lang['error_fill_fields']				=	'Please fill all the fields';


		/*** Validations (End) ***/

		/**** Edit Profile Page ****/

		$lang['text_nickname']					=	'Nickname';
		$lang['text_dob']						=	'Date of birth';
		$lang['text_gender']					=	'Gender';
		$lang['text_languages']					=	'Languages';
		$lang['text_video_url']					=	'Video Link Url';
		$lang['text_address']					=	'Address';
		$lang['text_country_passport']			=	'Country of Passport';
		$lang['text_city']						=	'Current City';
		$lang['text_about']						=	'About Yourself';
		$lang['text_faq']						=	'FAQ\'s';
		$lang['text_faq1']						=	'What\'s my hobby?';
		$lang['text_faq2']						=	'Why do I become a local expert?';
		$lang['text_image']						=	'Browse Photo';
		$lang['text_phone']						=	'Phone Number';
		$lang['text_send_sms']					=	'Send SMS';

		$lang['text_list_trip']					=	'List Trip';
		$lang['text_trip']						=	'Trip';

		$lang['tab_general']					=	'General';
		$lang['tab_verifications']				=	'Verifications';
		$lang['tab_settings']					=	'Settings';

		/**** Edit Profile Page (End) ****/

		/**** Verification ***/

		$lang['alert_otp_correct']				=	'Your Phone Number is now verified.';
		$lang['alert_otp_incorrect']			=	'OTP entered is incorrect';
		$lang['otp_sent']						=	'OTP has been sent to your entered mobile number. Please verify by entering it below.';
		$lang['text_please_wait']				=	'Please Wait..';
		$lang['text_upload']					=	'Upload';
		$lang['text_id_card']					=	'ID Card';
		$lang['text_id_card_upload']			=	'Upload ID Card';
		$lang['text_id_updated']				=	'ID Card updated Successfully';
		$lang['text_id_not_updated']			=	'Error in ID Card updation';

		$lang['text_bank_upload']				=	'Upload bank book';
		$lang['text_bank_updated']				=	'Bank Details updated Successfully';
		$lang['text_bank_not_updated']			=	'Error in Bank Details updation';

		$lang['text_verified']					=	'Verified';
		$lang['text_verify_otp']				=	'Verify OTP';
		$lang['text_verify_email']				=	'Verify Email';

		$lang['text_enter_otp']					=	'Enter OTP';
		$lang['text_enter_verfication_code']	=	'Enter Verification Code';
		$lang['text_verfication_email_sent']	=	'Verification email has been sent successfully to your email id. Please enter verification code below.';
		$lang['alert_verfication_incorrect']	=	'Entered Verification Code is incorrect';
		
		$lang['text_bank_account']				=	'Bank account';
		$lang['text_account_number']			=	'Account number';

		$lang['text_lorem']						=	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s';


		/******* Settings Page ********/

		$lang['error_new_confirm_pass']			=	'New And Confirm Password Does Not Match';
		$lang['text_password_changed']			=	'Password Changed Successfully';
		$lang['text_invalid_password']			=	'Invalid Password, try again';
		$lang['error_old_password']				=	'Old password did not match';

		$lang['text_email_updated']				=	'Email Updated Successfully';
		$lang['text_email_exists']				=	'Email address already exists';

		$lang['text_change_email']				=	'Change Email';
		$lang['text_change_password']			=	'Change Password';

		$lang['text_old_password']				=	'Old Password';
		$lang['text_new_password']				=	'New Password';
		$lang['text_confirm_password']			=	'Confirm Password';

		$lang['text_notification_settings']		=	'Notifications settings';
		$lang['text_notification_settings_des']	=	'Select your preferred channels for notification (Email is compulsory).';
		$lang['text_connect_other']				=	'Connect with other accounts';
		$lang['text_connect_fb']				=	'Connect with facebook';

		$lang['text_set_password']				=	'Set password';
		
		$lang['text_connected']					=	'Connected';

		$lang['error_enter_password']			=	'New Password is required';

		$lang['error_field_required']			=	'This field is required!';
		$lang['error_image_ext']				=	'Only jpg, jpeg and png formats are accepted';
		
		

		/******* Settings Page (END) ********/


		/***** Add Trip Page *****/

		$lang['text_basic']						=	'Basic';
		$lang['text_overview']					=	'Overview';
		$lang['text_detail']					=	'Detail';
		$lang['text_price']						=	'Price';
		$lang['text_condition']					=	'Condition';

		$lang['text_destination']				=	'Destination';
		$lang['text_stopped_location']			=	'Stopped By Location';
		$lang['text_main_activities']			=	'Main Activities';
		$lang['text_main_transportation']		=	'Main Transportation';
                
                $lang['text_name_your_trip']		=	'Name your trip';
                $lang['text_summary_your_trip']		=	'Summary of your trip';
                $lang['text_photos']                    =	'Photos';
                $lang['text_upload_only_photos']        =	'Please upload atleast 3 pictures.<br>Click on photo to make cover, Tell more detail about your picture';
                $lang['text_add_photos']                    =	'Add Photos';
                
                $lang['text_add_expense_title']                    =	'Extra expense travelers should prepare';
                $lang['text_add_expense_question']                    =	'Are there any extra expenses that travelers have to pay during the trip?
';
                $lang['text_add_expense_ph']                    =	'e.g. your pocket money';
                $lang['text_max_travellers']                    =	'Maximun travelers';
                
                $lang['text_basic_pricing']                    =	'Basic Pricing';
                $lang['text_advance_pricing']                    =	'Advance Pricing';
                $lang['text_additional_options']                    =	'Additional Options';
                $lang['text_enable_child_price']                    =	'Enable Child Price (Age 2-12)';
                
                $lang['text_extra_conditions']                    =	'Extra Conditions';
                $lang['text_optional']                    =	'(Optional)';
                
                $lang['text_approval_msg']                    =	'Your Trip details has been sent to admin for approval. You will be notified soon.';   
                $lang['text_approval_msg_er']                    =	'There is an error in sending trip details. Please fill all the required fields or try agin later.'; 
                
                $lang['text_add_more']                    =	'+ Add more';
                $lang['text_faq_title']                    =	'FAQ';
                $lang['text_faq1_detail_tab']                    =	'Why this Trip?';
                $lang['text_faq11_detail_tab']                    =	'Briefly explain your travelers why they should book your trip to quickly graps their attentions.';
                
                $lang['text_faq2_detail_tab']                    =	'Things to prepare fot the Trip?';
                $lang['text_faq22_detail_tab']                    =	'Is there anything travelers should prepare for this trip?';

                $lang['text_trip_detail']                    =	'Trip detail';
                $lang['text_meeting_point']                    =	'Meeting Point';
                $lang['text_schedule']                    =	'Schedule';
                $lang['text_delete_trip']                    =	'Delete this trip';
                

		/***** Add Trip Page (End) *****/
                
                /********* Trip Detail Page  **********/
                
                $lang['text_satisfaction_guaranteed']        =        ' Satisfaction guaranteed';
                $lang['text_hotel_pickup']                   =        ' Free Hotel Pickup';
                $lang['text_hosted_by']                   =        ' Hosted By';
                $lang['text_itinerary']                   =        ' Itinerary';
                $lang['text_price_condition']                   =        'Price condition';
                $lang['text_add_wishlist']                   =        'Add to wishlist';
                $lang['text_share']                   =        'Share';
                $lang['text_similar_trips']                   =        'Similar Trips';
                
                $lang['text_price_person']                   =        'Price per person';
                $lang['text_price_total']                   =        'Total Price';
                $lang['text_guests']                   =        'Guest(s)';
                $lang['text_instant_book']                   =        'Instant Book';
                $lang['text_send_msg']                   =        'Send a message';
                
                /********* Trip Detail Page (End)  **********/
                
                $lang['text_bookings']                   =        'Bookings';

		if(isset($lang[$text])){ 
			return $lang[$text];
		}else{
			return $text;
		}
	}
	
}