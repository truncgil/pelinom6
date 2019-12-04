<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$user = Auth::user();
			
		try {
			$profile = User::where(['id'=>$user->id])->first();
			$profile->name = $p['name'];
			$profile->surname = $p['surname'];
			$profile->email = $p['email'];
			$profile->phone = $p['phone'];
			if($p['password']!="" ) {
				$profile->password = Hash::make($p['password']);
			}
			$profile->json = json_encode($p,JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP);
			$profile->update();
			$return =  back()->with("mesaj","Bilgileriniz başarıyla güncellendi");
		} catch(\Exception $e) {
			$hata = substr($e,0,100);
			$return = back()->with("hata","Bilgiler kaydedilmedi. Hata kodu: $hata");
		}
		
		