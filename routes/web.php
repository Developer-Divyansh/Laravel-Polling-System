<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Poll;
use App\Models\Result;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {                                                                                               //Main Page Content
    $a = Poll::all();
    $b = Poll::where('status', '=', 'Active')->get();
    // dd($b);
    $c = Result::all();
    // print_r($b[0]->start_dt); die;
    return view('welcome')->with([ "all_poll"=>$a , "banner_poll"=>$b, "all_result"=>$c]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pollcreate', [App\Http\Controllers\AdminController::class, 'createpoll_view'])->name('pollcreate');              //Form for creating poll

Route::post('insertpoll', [App\Http\Controllers\AdminController::class, 'createpoll_method'])->name('insertpoll');

Route::post('insert_result', [App\Http\Controllers\HomeController::class, 'insert_result_method'])->name('insert_result');

Route::get('result_view', [App\Http\Controllers\AdminController::class, 'admin_result_view'])->name('result_view');

Route::get('poll_view', [App\Http\Controllers\AdminController::class, 'admin_poll_view'])->name('poll_view');                   //Table Showing all poll

Route::get('check_poll', [App\Http\Controllers\HomeController::class, 'check_poll_view'])->name('check_poll');

Route::get('fetch_result', [App\Http\Controllers\HomeController::class, 'fetch_result_method'])->name('fetch_result');







//************************************************ USERS ROUTES******************************************************************* */

Route::get('my_poll_view', [App\Http\Controllers\UserController::class, 'user_poll_view'])->name('my_poll_view');

Route::get('profile_view', [App\Http\Controllers\UserController::class, 'edit_profile'])->name('profile_view');



//************************************************ USERS ROUTES******************************************************************* */

Route::get('pollactive/{id}', [App\Http\Controllers\AdminController::class, 'poll_active_method'])->name('pollactive/{id}');

Route::get('polldeactive/{id}', [App\Http\Controllers\AdminController::class, 'poll_deactive_method'])->name('polldeactive/{id}');

Route::get('polldelete/{id}', [App\Http\Controllers\AdminController::class, 'poll_active_method'])->name('polldelete/{id}');