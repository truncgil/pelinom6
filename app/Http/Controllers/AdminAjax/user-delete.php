<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$user = User::where('id', $p['id'])->delete();
		$return = back()->with("mesaj","Kullanıcı silindi");

		