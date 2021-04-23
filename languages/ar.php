<?php

function language($lang)
{
	$arr[' '] = " ";
	$arr[':'] = " : ";
	$arr['/'] = " / ";
	$arr['-'] = " - ";
	$arr['*'] = " * ";
	
	$arr['edit'] = "تعديل";
	$arr['delete'] = "حذف";
	$arr['en'] = "انجليزي";
	$arr['ar'] = "عربي";
	$arr['first'] = "الأول";
	$arr['next'] = "التالي";
	$arr['previous'] = "السابق";
	$arr['last'] = "الأخير";
	$arr['total'] = "الاجمالي";
	$arr['select'] = "اختر";
	$arr['comment'] = "تعليق";
	$arr['share'] = "مشاركة";
	$arr['save'] = "حفظ";
	$arr['deletemodal'] = "هل انت متاكد من رغبتك في حذف هذا البيان ؟";
	$arr['agree'] = "موافق";
	$arr['no'] = "لا";
	$arr['cantdelete'] = "لا يمكنك حذف هذا البيان لانه يحتوي على ";
	$arr['success'] = "تمت بنجاح";
	$arr['nodata'] = "لا توجد بيانات";
	
	//	Messages
	$arr['m1'] = "تمت العملية بنجاح";
	$arr['m2'] = "يوجد خطا ما";
	$arr['m3'] = "اكتب البيان بشكل صحيح";
	$arr['m4'] = "المدخل غير متاح";
	$arr['m5'] = "كل الخانات مطلوبة";
	$arr['m6'] = "كلمتا السر يجب ان يتساويا";
	$arr['m7'] = "كلمة السر يجب ان تكون اكثر من او يساوي 8 حروف";
	$arr['m8'] = "خانة من يجب ان تكون اصغر من او تساوي خانة الى";
	$arr['m9'] = "اسم المستخدم غير متاح";
	$arr['m10'] = "تم تحويل الرصيد اليك بنجاح";
	$arr['m11'] = "تم ارسال الرسالة";
	$arr['m12'] = "املا الخانات بشكل صحيح";
	$arr['m13'] = "الايميل غير متاح";
	$arr['m14'] = "البريد الاكتروني او كلمة المرور غير صحيحتان";
	$arr['m15'] = "الحساب لم يفعل بعد";
	$arr['m16'] = "ِالحساب مفعل سابقا";
	$arr['m17'] = "ِالحساب ليس موجود";
	$arr['m18'] = "لو سمحت ادخل الى بريدك الالكتروني وفعل الحساب";
	$arr['m19'] = "تم تفعيل حسابك";
	
	// Register
	$arr['register'] = "التسجيل";
	$arr['address'] = "العنوان";
	$arr['phone'] = "الهاتف";
	$arr['dealer'] = "تاجر";
	
	// Login
	$arr['currentuser'] = "مستخدم حالي";
	$arr['username'] = "اسم المستخدم";
	$arr['email'] = "البريد الالكتروني";
	$arr['password'] = "كلمة المرور";
	$arr['login'] = "الدخول";
	
	// Menu
	$arr['menu'] = "القائمة";
	$arr['slides'] = "صور الرئيسية";
	$arr['system'] = "النظام";
	$arr['pages'] = "الصفحات";
	$arr['blog'] = "المدونة";
	$arr['genders'] = "الفئات العمرية";
	$arr['fields'] = "المجالات";
	$arr['courses'] = "الدورات";
	$arr['plans'] = "الخطط";
	$arr['orders'] = "الطلبات";
	$arr['users'] = "المستخدمين";
	$arr['testimonials'] = "الشهادات";
	$arr['contact'] = "التواصل";
	$arr['account'] = "الحساب";
	$arr['logout'] = "الخروج";
	
	// System
	$arr['website'] = "اسم الموقع";
	$arr['logo'] = "لوجو الموقع";
	$arr['paypal'] = "باي بال";
	$arr['bank'] = "بنك";
	
	// Pages
	$arr['page'] = "الصفحة";
	$arr['keywords'] = "الكلمات الدالة";
	
	// Blog
	$arr['preview'] = "المشاهدة";
	
	// Fields
	$arr['gender'] = "الفئة العمرية";
	
	// Courses
	$arr['course'] = "الدورة";
	$arr['field'] = "المجال";
	$arr['description'] = "الوصف";
	$arr['active'] = "التفعيل";
	
	// Plans
	$arr['plan'] = "الخطة";
	$arr['title'] = "العنوان";
	$arr['fees'] = "المصاريف";
	$arr['month'] = "شهر";
	$arr['featured'] = "المفضلة";
	
	// Orders
	$arr['delivered'] = "تم التوصيل";
	$arr['nondelivered'] = "قيد التوصيل";
	$arr['time'] = "الوقت";
	$arr['dtime'] = "وقت التوصيل";
	
	// Users
	$arr['paycourses'] = "الكورسات المدفوعة";
	$arr['freecourses'] = "الكورسات المجانية";
	$arr['number'] = "العدد";
	
	// Contact
	$arr['address'] = "العنوان";
	$arr['phone'] = "الهاتف";
	$arr['mobile'] = "الموبايل";
	$arr['facebook'] = "فيسبوك";
	$arr['twitter'] = "تويتر";
	$arr['googleplus'] = "جوجل بلاس";
	$arr['linkedin'] = "لينكد ان";
	$arr['youtube'] = "يوتيوب";
	
	echo $arr[$lang];
}

?>