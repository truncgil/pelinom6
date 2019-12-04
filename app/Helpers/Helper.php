<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
function upload($file,$folder="") {
	$request = \Request::all();
	
	$ext = $request[$file]->getClientOriginalExtension();
	$name = $request[$file]->getClientOriginalName();
	$path = $request[$file]->storeAs("files/$folder",$name);
	return "storage/app/$path";
}
function contents() {
	return 0;
}
function kd() {
	return 0;
}
function ksorgu() {
	return 0;
}
function e2($text) {
	echo __($text);
}
function set($text) {
	echo __($text);
}
function set_return($text) {
	return __($text);
}
function ekle($dizi,$tablo="contents") {
	DB::table($tablo)->insert($dizi);
}
function json_encode_tr($string)
{
    return json_encode($string, JSON_UNESCAPED_UNICODE);
}
function j($json) {
	return json_decode($json,true);
}
function get($isim) {
	if (isset($_GET[$isim])) { 
		return $_GET[$isim];
	} else {
		return "";
	}
}
function yonlendir($url) {
	header("Location: $url");
	exit();
}

function getisset($isim) {
	if (isset($_GET[$isim])) { 
		return 1;
	} else {
		return 0;
	}
}

function postEsit($post,$deger) {
	$post = post($post);
	if($post==$deger) {
		return 1;
	} else {
		return 0;
	}
}
function oturumEsit($oturum,$deger) {
	$oturum = oturum($oturum);
	if($oturum==$deger) {
		return 1;
	} else {
		return 0;
	}
}
function getEsit($get,$deger) {
	$get = get($get);
	if($get==$deger) {
		return 1;
	} else {
		return 0;
	}
}

function post($isim,$deger="") {
	if($deger!="") {
		$_POST[$isim] = $deger;
	} else {
		if (isset($_POST[$isim])) { 
			return @trim($_POST[$isim]);
		} else {
			return "";
		}
	}
}
function postisset($isim) {
	if (isset($_POST[$isim])) { 
		return 1;
	} else {
		return 0;
	}
}
function oturum($isim,$deger="") {
	oturumAc();
	if (isset($_SESSION[$isim])) {
		if ($deger=="") {
			return $_SESSION[$isim];
		} else {
			$_SESSION[$isim] = $deger;
			return $_SESSION[$isim];
		}
	} elseif ($deger!="") {
		$_SESSION[$isim] = $deger;
		return $_SESSION[$isim];

	}
}
function oturumisset($isim) {
	oturumAc();
	if (isset($_SESSION[$isim])) {
		return 1;
	} else {
		return 0;
	}
}
function oturumAc($sonuc="") { 
	if (!isset($_SESSION)) {
	  @session_start();
	  echo $sonuc;
	}
	}

function diger_ayarlar() {
	return explode(",","users,languages,contents,new,fields,search");
	
} 
	function json_field($json,$field) { //bir json içinde girilmiş alanı bulur bu aslında post ederken boşluk içeren alanlarda otomatik oluşan _ karakteri sorunundan dolayı üretildi
		return @$json[str_replace(" ","_",$field)];
		
	}
	function validBase64($string)
{
    $decoded = base64_decode($string, true);

    // Check if there is no invalid character in string
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false;

    // Decode the string in strict mode and send the response
    if (!base64_decode($string, true)) return false;

    // Encode and compare it to original one
    if (base64_encode($decoded) != $string) return false;

    return true;
}
function isJSON($string){
   return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
function getLangFile($lang) {
	$path = "resources/lang/$lang".".json";
	if(file_exists($path)) {
		return file_get_contents($path);
	} else {
		$json = json_encode(array());
		file_put_contents($path,$json);
		return file_get_contents($path);
	}		
}
function putLangFile($lang,$json) {
	if(isJSON($json)) {
		return file_put_contents("resources/lang/$lang".".json",$json);	
	} else {
		return null;
	}
}
function is_html($string)
{
  return preg_match("/<[^<]+>/",$string,$m) != 0;
}