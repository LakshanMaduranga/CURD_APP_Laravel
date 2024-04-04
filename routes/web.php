<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get ('/user',[UserController::class, 'index'])->name('user.index');
Route::get ('/user/create',[UserController::class, 'create'])->name('user.create');
Route::post ('/user',[UserController::class, 'store'])->name('user.store');
Route::get ('/user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put ('/user/{user}/update',[UserController::class, 'update'])->name('user.update');

Route::delete ('/user/{user}/delete',[UserController::class, 'delete'])->name('user.delete');