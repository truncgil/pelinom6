<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAjaxController extends Controller
{
    public function index(Request $request, string $var) {
		if (Auth::check()) {
			$this->middleware('auth');
			$path = "AdminAjax/$var.php";
			include($path);
			return $return; // return i�lemi include da �al��mad���ndan bir de�i�ken ile buraya aktard�k
		} else {
			return abort(403);
		}
		/*
		try {
			include("AdminAjax/$var.php");
		} catch (\Exception $e) {
			return abort(404);
		}
		*/
		
	}
}
