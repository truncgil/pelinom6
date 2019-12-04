<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function default()
    {	
		$c = DB::table('contents')
			->where("slug","1")
			->limit(1);
        return view('default',['c'=>$c]);
    }
    public function admin()
    {
		$this->middleware('auth');
        return view('admin/index');
    }
    public function adminDefault()
    {
		$this->middleware('auth');
        return view('admin/default');
    }
}
