<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OderdetailsController;

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
Route::get('/', function(){
    return view('welcome');
});
Route::get('/paypal', [OderdetailsController::class, 'show']);
Route::get('/success', function(){
    return view('success');
});
Route::get('/cancel', function(){
    return view('cancel');
});
