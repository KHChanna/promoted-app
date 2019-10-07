<?php

namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('frontend::my.account.account');
    }


    public function profile_show()
    {
        return view('frontend::my.account.profile');
    }




}
