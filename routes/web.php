<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

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
Route::get('blog' , [UserController::class , 'list'])->name('Users.userlist');
Route::get('User/create' , [UserController::class , 'create'])->name('Users.create');
Route::post('/store' , [UserController::class , 'store'])->name('Users.store');
Route::get('/blog/{id}/edit' ,[UserController::class , 'edit'])->name('Users.edit');
Route::put('/blog/update/{id}/' ,[UserController::class , 'update'])->name('Users.update');
Route::get('/blog/delete/{id}/' ,[UserController::class , 'destroy'])->name('Users.destroy');



