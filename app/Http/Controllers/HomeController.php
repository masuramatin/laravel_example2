<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$results = DB::select('select * from blogs limit 0,5');
		$comments = DB::select('select * from comments limit 0,5');
		$contact = DB::select('select * from contacts limit 0,5');
		$users = DB::select('select * from users limit 0,5');

        return view('home', compact('results','comments','contact','users'));
		
    }
}
