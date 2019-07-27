<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestTimeTracking;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    if (Auth::check()) {
      $users = GuestTimeTracking::whereNull('time_out')->get();

      return view('home', ['users' => $users]);
    }

      return view('home');
      
    }
}
