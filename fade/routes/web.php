<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about' , function(){
//    return view('about');
// });
// Route::get('/contact', function(){
//     return view('contact');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/', [FrontendController::class, 'welcome'])->name('welcome') ;
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

//usercontroller
Route::get('/users',[UserController::class, 'users'])->name('users');
Route::get('/delete/user/{user_id}',[UserController::class, 'delete'])->name('del.user');

//profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/name/change', [UserController::class, 'changeName'])->name('name.change');
Route::post('/password/change', [UserController::class, 'changePass'])->name('pass.change');
Route::post('/photo/change', [UserController::class, 'changePhoto'])->name('photo.change');

//category
Route::get('/category/list', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/delete/{category_id}', [CategoryController::class,'category_delete'])->name('category.delete');
//Hard Delete
Route::get('/category/hard/delete/{category_id}', [CategoryController::class,'category_hard_delete'])->name('category.hard.delete');

//Restore
Route::get('/category/restore/{category_id}', [CategoryController::class,'category_restore'])->name('category.restore');

//Edit
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');

//Update
Route::post('/category/update',[CategoryController::class, 'category_update'])->name('category.update');

