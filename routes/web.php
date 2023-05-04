<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ususController;
use App\Http\Middleware\AuthLoginMiddleware;


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


Route::get('/index', function () {
    return view('index');
});

Route::get('/other', function () {
    return view('other');
});

Route::get('login', function () { return view('login');});

Route::get('register', function () { return view('register');});


Route::withoutMiddleware([AuthLoginMiddleware::class])->group(function() {

    Route::post('/DRuser',[ususController::class, 'RegisterUser']);
    Route::post('/checkOfdUSER',[ususController::class, 'ChOFDuser']);

});

Route::post('/logout',[ususController::class, 'logout']);


