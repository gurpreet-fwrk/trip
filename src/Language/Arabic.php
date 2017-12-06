<?php
namespace App\Language;

/**
* 
*/
class Arabic{

	function get($text){

		$lang = array();
		

		/** Header **/

		$lang['list_trip']						=	'قائمة رحلتك';
		$lang['help_center']					=	'مركز المساعدة';
		$lang['text_login']						=	'تسجيل الدخول';
		$lang['text_login_now']					=	'تسجيل الدخول الآن';
		$lang['text_signup']					=	'أفتح حساب الأن';
		$lang['text_logout']					=	'الخروج';
		$lang['text_submit']					=	'عرض';
		$lang['text_usd']						=	'دولار أمريكي';
		$lang['text_dollar']					=	'دولار';
		$lang['text_euro']						=	'اليورو';

		$lang['text_or']						=	'أو';
		$lang['text_authenticating']			=	'مصادقة ...';

		$lang['text_name']						=	'اسم';
		$lang['text_firstname']					=	'الاسم الاول';
		$lang['text_lastname']					=	'الكنية';
		$lang['text_email']						=	'البريد الإلكتروني';
		$lang['text_password']					=	'كلمه السر';
		$lang['text_epassword']					=	'أدخل كلمة المرور';
		$lang['text_repassword']				=	'أعد إدخال كلمة المرور الجديدة';
		$lang['text_getstarted']				=	'البدء';
		$lang['text_dont_have_account']			=	'ليس لديك حساب؟';
		$lang['text_create_account']			=	'انشئ حساب';
		$lang['text_already_account']			=	'هل لديك حساب بالفعل؟';

		$lang['text_edit_profile']				=	'تعديل الملف الشخصي';

		/** Header (End) **/

		/** Footer **/

		$lang['text_contact_info']				=	'معلومات الاتصال';

		$lang['text_connect']					=	'اتصل بنا';
		$lang['text_connect_follow']			=	'الاتصال ومتابعتنا على وسائل الاعلام الاجتماعية';

		$lang['text_newsletter']				=	'النشرة الإخبارية';
		$lang['text_newsletter2']				=	'الاشتراك في النشرة الإخبارية لدينا. ونحن لن البريد المزعج';
		$lang['button_subscribe']				=	'الاشتراك';

		/** Footer (End) **/

		$lang['text_banner']					=	'تجد جولة خاصة بك اليوم';
		$lang['text_save']						=	'حفظ';

		/*** Validations ***/

		$lang['error_username']					=	'الرجاء إدخال اسم المستخدم!';
		$lang['error_password']					=	'من فضلك أدخل رقمك السري!';
		$lang['error_login_credentials']		=	'اسم المستخدم خاطئ / كلمة المرور! حاول مرة اخرى!';
		$lang['success_login']					=	'تم تسجيل الدخول بنجاح';
		$lang['enter_mobile']					=	'الرجاء إدخال رقم الجوال';
		$lang['error_fill_fields']				=	'رجاء إملأ كافة الحقول';

		/*** Validations (End) ***/

		/**** Edit Profile Page ****/

		$lang['text_nickname']					=	'كنية';
		$lang['text_dob']						=	'تاريخ الولادة';
		$lang['text_gender']					=	'جنس';
		$lang['text_languages']					=	'اللغات';
		$lang['text_video_url']					=	'رابط رابط الفيديو';
		$lang['text_address']					=	'عنوان';
		$lang['text_country_passport']			=	'بلد جواز السفر';
		$lang['text_city']						=	'المدينة الحالية';
		$lang['text_about']						=	'عن نفسك';
		$lang['text_faq']						=	'أسئلة وأجوبة';
		$lang['text_faq1']						=	'؟ما هوايتي';
		$lang['text_faq2']						=	'؟لماذا أصبح خبيرا محليا';
		$lang['text_image']						=	'تصفح الصور';
		$lang['text_phone']						=	'رقم الهاتف';
		$lang['text_send_sms']					=	'أرسل رسالة نصية قصيرة';

		$lang['text_list_trip']					=	'قائمة الرحلة';
		$lang['text_trip']						=	'رحلة قصيرة';

		$lang['tab_general']					=	'جنرال لواء';
		$lang['tab_verifications']				=	'التحقق';
		$lang['tab_settings']					=	'إعدادات';

		/**** Edit Profile Page (End) ****/

		/**** Verification ***/

		$lang['alert_otp_correct']				=	'تم التحقق من رقم هاتفك الآن.';
		$lang['alert_otp_incorrect']			=	'إدخال أوتب غير صحيح';
		$lang['otp_sent']						=	'تم إرسال أوتب إلى رقم هاتفك الجوال الذي تم إدخاله. يرجى التحقق من خلال إدخاله أدناه.';
		$lang['text_please_wait']				=	'..أرجو الإنتظار';
		$lang['text_upload']					=	'تحميل';
		$lang['text_id_card']					=	'بطاقة التعريف';
		$lang['text_id_card_upload']			=	'تحميل بطاقة الهوية';
		$lang['text_id_updated']				=	'تم تحديث بطاقة الهوية بنجاح';
		$lang['text_id_not_updated']			=	'حدث خطأ في تحديث بطاقة الهوية';

		$lang['text_bank_upload']				=	'تحميل كتاب مصرفي';
		$lang['text_bank_updated']				=	'تم تحديث تفاصيل البنك بنجاح';
		$lang['text_bank_not_updated']			=	'حدث خطأ في تفاصيل أوبداتيون';
		
		$lang['text_verified']					=	'التحقق';

		$lang['text_verify_otp']				=	'تحقق من مكتب المدعي العام';
		$lang['text_verify_email']				=	'التحقق من البريد الإلكتروني';

		$lang['text_enter_otp']					=	'أدخل أوتب';
		$lang['text_enter_verfication_code']	=	'أدخل رمز التحقق';
		$lang['text_verfication_email_sent']	=	'تم إرسال رسالة التحقق بنجاح إلى معرف بريدك الإلكتروني. الرجاء إدخال رمز التحقق أدناه.';

		$lang['text_bank_account']				=	'حساب البنك';
		$lang['text_account_number']			=	'رقم حساب';

		$lang['text_lorem']						=	'أبجد هوز هو مجرد دمية النص من الطباعة والتنضيد الصناعة. كان أبجد هوز هذه الصناعة';


		/******* Settings Page ********/

		$lang['error_new_confirm_pass']			=	'كلمة المرور الجديدة والتأكيد غير متطابقة';
		$lang['text_password_changed']			=	'تم تغيير الرقم السري بنجاح';
		$lang['text_invalid_password']			=	'كلمة المرور غير صالحة، أعد المحاولة';
		$lang['error_old_password']				=	'لم تتطابق كلمة المرور القديمة';

		$lang['text_email_updated']				=	'تم تحديث البريد الإلكتروني بنجاح';
		$lang['text_email_exists']				=	'عنوان البريد الإلكتروني موجود من قبل';

		$lang['text_change_email']				=	'تغيير الايميل';
		$lang['text_change_password']			=	'تغيير كلمة السر';

		$lang['text_old_password']				=	'كلمة المرور القديمة';
		$lang['text_new_password']				=	'كلمة السر الجديدة';
		$lang['text_confirm_password']			=	'تأكيد كلمة المرور';

		$lang['text_notification_settings']		=	'إعدادات الإخطارات';
		$lang['text_notification_settings_des']	=	'حدد القنوات المفضلة للإشعار (البريد الإلكتروني إلزامي).';
		$lang['text_connect_other']				=	'تواصل مع حسابات أخرى';
		$lang['text_connect_fb']				=	'تواصل مع الفيسبوك';

		$lang['text_set_password']				=	'ضبط كلمة السر';

		$lang['text_connected']					=	'متصل';

		$lang['error_enter_password']			=	'مطلوب كلمة مرور جديدة';

		$lang['error_field_required']			=	'!هذه الخانة مطلوبه';
		$lang['error_image_ext']				=	'يتم قبول تنسيقات جبغ و جبيغ و ينغ فقط';
		
		/******* Settings Page (END) ********/

		/***** Add Trip Page *****/

		$lang['text_basic']						=	'الأساسية';
		$lang['text_overview']					=	'نظرة عامة';
		$lang['text_detail']					=	'التفاصيل';
		$lang['text_price']						=	'السعر';
		$lang['text_condition']					=	'شرط';

		$lang['text_destination']				=	'المكان المقصود';
		$lang['text_stopped_location']			=	'توقف عن طريق الموقع';
		$lang['text_main_activities']			=	'الأنشطة الرئيسية';
		$lang['text_main_transportation']		=	'النقل الرئيسي';

		/***** Add Trip Page (End) *****/

		if(isset($lang[$text])){
			return $lang[$text];
		}else{
			return $text;
		}
	}

}