<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
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


Route::get('/home', [HomeController::class, 'home'])->name('home');

//frontend
Route::get('/', [FrontendController::class, 'index']) ;
Route::get('/product/details', [FrontendController::class, 'p_details'])->name('product.details');

//dashboard
 Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');


 
// Route::get('/about', [FrontendController::class, 'about'])->name('about');
// Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

//usercontroller
Route::get('/users',[UserController::class, 'users'])->name('users');
Route::get('/delete/user/{user_id}',[UserController::class, 'delete'])->name('del.user');

//profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/name/change', [UserController::class, 'changeName'])->name('name.change');
Route::post('/password/change', [UserController::class, 'changePass'])->name('pass.change');
Route::post('/photo/change', [UserController::class, 'changePhoto'])->name('photo.change');

//category start

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

//category end

//subcategory start

Route::get('/subcategory',[SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('/subcategory/store', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');
//Subcategory Edit
Route::get('/subcategory/edit/{subcategory_id}',[SubcategoryController::class,'subcategory_edit'])->name('subcategory.edit');
//Subcategory Update
Route::post('/subcategory/update',[SubcategoryController::class,'subcategory_update'])->name('subcategory.update');
Route::get('/subcategory/delete/{subcategory_id}', [SubcategoryController::class,'subcategory_delete'])->name('subcategory.delete');

//subcategory end

//product start
Route::get('add/product', [ProductController::class, 'add_product'])->name('add.product');
Route::post('/getsubcategory', [ProductController::class, 'getsubcategory']);
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product/color/size', [ProductController::class, 'color_size'])->name('add.color.size');
Route::post('/add/color', [ProductController::class, 'add_color'])->name('add.color');
Route::post('/add/size', [ProductController::class, 'add_size'])->name('add.size');
Route::get('inventory/{id}', [ProductController::class, 'inventory'])->name('inventory');
Route::post('store/inventory/{id}', [ProductController::class, 'addinventory'])->name('store.inventory');
//product end


