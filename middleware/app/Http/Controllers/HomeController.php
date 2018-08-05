<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   


        //session(['onesimo' => 'student']);
        
        //$request->session()->put(['edwin' => 'instructor']);
        
        //$request->session()->forget('edwin');
        
        //delete all function
        //$request->session()->flush();
        
        //return $request->session()->get('edwin');
        
        //return $request->session()->all();
        //return view('home');

        // $request->session()->flash('message','post has been created');

        //return $request->session()->get('message');
        
        /* keepin an reflash session
        $request->session()->reflash();
        $request->session()->keep('message');
        */

    }
}
