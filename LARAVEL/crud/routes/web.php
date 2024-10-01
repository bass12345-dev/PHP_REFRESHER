<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[UserController::class,'index']);
Route::post('/add-user',[UserController::class,'add_user']);