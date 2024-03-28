<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return 'Hello World';
});

Route::get('/code/php', function (){ 
    echo '<h1> Selamat Datang </h1>';
    echo '<p align="center">Saya Fizz</p>';
     });
    



Route::get('/route-pertama', function () {
    return view('index');
});

Route::get('/user',[UserController::class,'index']);
Route::get('/tambahuser',[UserController::class,'tambah']);
Route::post('/kirimuser',[UserController::class,'add']);
Route::get('/user/detail/{id}',[UserController::class,'detail']);
Route::get('/user/edit/{id}',[UserController::class,'detailedit']);
Route::post('/edituser/{id}',[UserController::class,'edit']);


