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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {


    return view('welcome');

});

Auth::routes(['verify' => true]);
Route::get('/auth/google', 'Auth\GoogleAuthController@redirect')->name('auth.google');
Route::get('/auth/google/callback', 'Auth\GoogleAuthController@callback');

Route::get('/auth/token' , 'Auth\AuthTokenController@getToken')->name('2fa.token');
Route::post('/auth/token' , 'Auth\AuthTokenController@postToken');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testing', 'TestingController@index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/twofactor', 'ProfileController@manageTwoFactor')->name('profile.2fa.manage');
    Route::post('/profile/twofactor', 'ProfileController@postManageTwoFactor');

    Route::get('profile/twofactor/phone', 'ProfileController@getPhoneVerify')->name('profile.2fa.phone');
    Route::post('profile/twofactor/phone', 'ProfileController@postPhoneVerify');

});









