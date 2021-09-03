<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OderdetailsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/post', [PostController::class, 'index']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::post('/post', [PostController::class, 'store']);
    Route::put('/post/{id}', [PostController::class, 'update']);
    Route::delete('/post/{id}', [PostController::class, 'destroy']);  

    Route::get('/post/{p_id}/comment', [CommentController::class, 'index']);
    Route::post('/post/{p_id}/comment', [CommentController::class, 'store']);
    Route::put('/post/{p_id}/comment/{id}', [CommentController::class, 'update']);
    Route::delete('/post/{p_id}/comment/{id}', [CommentController::class, 'destroy']); 

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/order', [OderController::class, 'store']);  
    Route::post('/order/{id}', [OderController::class, 'update']); 
    Route::delete('/order/{id}', [OderController::class, 'destroy']); 
    Route::post('/orderdetails', [OderdetailsController::class, 'store']);   
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
