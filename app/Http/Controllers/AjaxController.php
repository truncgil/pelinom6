<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(Request $request, string $var) {
		$this->middleware('auth');
		$path = "Ajax/$var.php";
		try {
			include("Ajax/$var.php");
			return $return;
		} catch (\Exception $e) {
			echo $e;
			//return abort(404);
		}
		
	}
}
