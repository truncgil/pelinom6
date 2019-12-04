<?php 


$locale = $_GET['l'];
/*
if (!in_array($locale, ['en', 'ru', 'lv'])){
        $locale = 'en';
    }
*/
	oturumAc();
	oturum("locale",$locale);
	echo App::setLocale($locale);
   // Session::put('locale', $locale);
   // return redirect(url(URL::previous()));
   print_r($_SESSION);
   var_dump(App::getLocale());
    $return = null;
 ?>