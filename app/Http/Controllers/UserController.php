<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Result;

class UserController extends Controller
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
    
    //

    public function user_poll_view(){

        $t = date('Y-m-d H:i:s');

        $ctn = Result::where('user_id', Auth::id())->get();
        return view('UserViewPoll')->with(['Poll' => $ctn]);
    }

    public function edit_profile(){

        $u = user::where('user_id', Auth::id())->get();
        return view('UserProfile')->with(['data' => $u]);
    }

    
}
