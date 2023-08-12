<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BanKDetailsController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ReferrerLinkController;
use App\Http\Controllers\RefererBonusController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\TenKController;
use App\Http\Controllers\twoHundredKController;
use App\Http\Controllers\tweentyKController;
use App\Http\Controllers\fiftyKController;
use App\Http\Controllers\hundredKController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/auth.php';




if (Auth::check()) {
  Route::get('/', function(){
    return view('auth.register');
  });

}

Route::group(['middleware' => ['web','auth']], function () {
  Route::get('/', function () {
      return view('dashboard.index');
  });

   Route::get('/bank', [BankDetailsController::class, 'index']);
   Route::get('/bank_create', [BankDetailsController::class, 'create']);
   Route::post('/store_bank_details', [BankDetailsController::class, 'store']);

   Route::get('referrerLink', [ReferrerLinkController::class, 'link']);

   Route::get('refererBonus', [NavigationController::class, 'bonus']);

   //Route::get('/support', [NavigationController::class, 'support']);

   Route::get('/about', [NavigationController::class, 'about']);

   Route::get('/dashboard', [DashBoardController::class, 'index']);
   Route::get('/five', [DashBoardController::class, 'user']);
   Route::post('/five', [DashBoardController::class, 'store']);

   Route::get('/ten', [TenKController::class, 'user']);
   Route::post('/ten', [TenKController::class, 'store']);

   Route::get('/tweenty', [tweentyKController::class, 'user']);
   Route::post('/tweenty', [tweentyKController::class, 'tweenty_store']);

   Route::get('/fifty', [fiftyKController::class, 'user']);
   Route::post('/fifty', [fiftyKController::class, 'fifty_store']);

   Route::get('/hundred', [hundredKController::class, 'user']);
   Route::post('/hundred', [hundredKController::class, 'hundred_store']);

   Route::get('/two_hundred', [twoHundredKController::class, 'user']);
   Route::post('/two_hundred', [twoHundredKController::class, 'two_hundred_store']);


   Route::get('/support', [SupportController::class, 'index']);
   Route::post('/add_member', [SupportController::class, 'store']);





});
