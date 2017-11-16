<?php

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
use App\User;
Route::get('/install', function () {
    $user = new User;
    $user->email = 'admin';
    $user->active = true;
    $user->name = 'admin';
    $user->password = Hash::make('admin');
    $user->description = 'lorum';
    $user->save();
//    return view('welcome');
});

Route::get('/email', function() {
    $user = User::find(6);
   return new \App\Mail\UserAccountInformation($user);
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('users', 'UsersController');

    //
});

Auth::routes(['except' => 'logout']);

Route::get('logout', function (){
    Auth::logout();
    return redirect('/');
});

//Route::get('/home', 'HomeController@index')->name('home');

