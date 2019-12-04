<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$contents = Contents::where('title', '')
		->where('type',$p['type'])
		->delete();
		$return = back()->with("mesaj","Tüm boş kayıtlar silindi");

		