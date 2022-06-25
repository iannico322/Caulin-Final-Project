<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
 
 
Route::get('/', function () {
    return view('welcome');
});

Route::post("authenticate",[ContactController::class, 'userlogIn']);
 
Route::get('/authentication', function () {
    return view('authentication');
});
 
Route::resource('/profile', ContactController::class);