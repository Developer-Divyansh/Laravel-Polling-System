<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Result;

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
        return view('home');
    }


    public function check_poll_view()
    {

        $t = date('Y-m-d H:i:s');

        $s = Poll::whereDate('start_dt', '<=',  date('Y-m-d'))->whereDate('end_dt', '>=',  date('Y-m-d'))->whereTime('start_dt', '<=',  date('H:i:s'))->whereTime('end_dt', '>=',  date('H:i:s'))->first();
        return $s;
    }

    // public function fetch_result_method()
    // {
    //     $re = Result::where('user_id', '=',  Auth::id())->where('poll_id', '>=',  )->whereTime('start_dt', '<=',  date('H:i:s'))->whereTime('end_dt', '>=',  date('H:i:s'))->first();
    //     return $re;
    // }



    public function insert_result_method(Request $request)
    {
        if (!empty(Auth::id())) {
            $p = $request->input('poll_id');
            $r = Result::where('user_id', Auth::id())->where('poll_id', $p)->first();

            if (!empty($r)) {
                Result::where('user_id', Auth::id())->where('poll_id', $p)->update(
                    [
                        "answer" => $request->input('answer'),
                    ]
                );
            } else {
                $t = new Result;

                $t->question = $request->input('question');
                $t->answer = $request->input('answer');
                $t->correct_op = $request->input('correct_op');
                $t->poll_id = $request->input('poll_id');
                $t->user_id = Auth::id();

                $t->save();
            }

            return response("Your answer is submited");
        } else {
            return redirect("login")->with('succsess', 'You have to LogIn first....');
        }
    }
}
