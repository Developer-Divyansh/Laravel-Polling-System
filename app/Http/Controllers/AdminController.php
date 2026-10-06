<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Result;
use DateTime;

class AdminController extends Controller
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
    
    public function createpoll_view()
    {
        return view('AdminCreatePoll');
    }

    public function createpoll_method(Request $request)
    {
        $t = new Poll;

        $t->question = $request->input('question');
        $t->op1 = $request->input('op1');
        $t->op2 = $request->input('op2');
        $t->op3 = $request->input('op3');
        $t->op4 = $request->input('op4');
        $t->correct_op = $request->input('correct_op');
        $t->start_dt =date('Y-m-d H:i:s', strtotime($request->input('start_dt')));
        $t->end_dt = date('Y-m-d H:i:s', strtotime($request->input('end_dt')));
        $t->status = "Deactive";

        $t->save();

        return redirect('poll_view');
    }

    public function admin_poll_view(){

        $ctn = Poll::all();
        return view('AdminViewPoll')->with(['Poll' => $ctn]);
    }

    public function admin_result_view(){

        $ctn = Result::all();
        return view('AdminViewResult')->with(['Result' => $ctn]);
    }

    public function poll_active_method($id)
    {
        $s = Poll::find($id);
        $s->Status = "Active";
        $s->update();

        return redirect('poll_view');
    }

    public function poll_deactive_method($id)
    {
        $s = Poll::find($id);
        $s->Status = "Deactive";
        $s->update();

        return redirect('poll_view');
    }

    public function poll_delete_method($id)
    {
        $s = Poll::find($id);
        $s->delete();

        return redirect('poll_view');
    }

    

}
