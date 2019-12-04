<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$user = Auth::user();
		$rand = rand(111111,999999);	
		try {
			$profile = User::where(['id'=>$p['id']])->first();
			$profile->password = Hash::make($rand);
			$profile->recover = $rand;
			$profile->update();
			$return =  back()->with("mesaj","Kullanıcı giriş şifresi güncellendi. Şifre: $rand");
		} catch(\Exception $e) {
			$hata = substr($e,0,100);
			$return = back()->with("hata","Bilgiler kaydedilmedi. Hata kodu: $hata");
		}
		
		