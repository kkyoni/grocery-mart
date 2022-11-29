<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[Admin\Auth\LoginController::class,'showLoginForm'])->name('showLoginForm');
Route::get('login',[Admin\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login',[Admin\Auth\LoginController::class,'login']);
Route::get('resetPassword',[Admin\Auth\PasswordResetController::class,'showPasswordRest'])->name('resetPassword');
Route::post('sendResetLinkEmail',[Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('sendResetLinkEmail');
Route::get('find/{token}',[Admin\Auth\PasswordResetController::class,'find'])->name('find');
Route::post('create',[Admin\Auth\PasswordResetController::class,'create'])->name('sendLinkToUser');
Route::post('reset',[Admin\Auth\PasswordResetController::class,'reset'])->name('resetPassword_set');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//====================> Update Admin Profile =========================
Route::get('/profile',[\App\Http\Controllers\UsersController::class, 'updateProfile'])->name('profile');
Route::post('/updateProfileDetail',[\App\Http\Controllers\UsersController::class, 'updateProfileDetail'])->name('updateProfileDetail');
Route::post('/updatePassword',[\App\Http\Controllers\UsersController::class, 'updatePassword'])->name('updatePassword');

//====================> User Management =========================
Route::get('/user',[\App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
Route::post('/user/delete/{id}',[\App\Http\Controllers\UsersController::class, 'delete'])->name('user.delete');
Route::get('/user/show',[\App\Http\Controllers\UsersController::class, 'show'])->name('user.show');
Route::post('/user/change_status',[\App\Http\Controllers\UsersController::class, 'change_status'])->name('user.change_status');

//====================> CMS Management =========================
Route::get('/cms',[\App\Http\Controllers\CmsController::class, 'index'])->name('cms.index');
Route::post('/cms/delete/{id}',[\App\Http\Controllers\CmsController::class, 'delete'])->name('cms.delete');
Route::get('/cms/show',[\App\Http\Controllers\CmsController::class, 'show'])->name('cms.show');
Route::get('/cms/edit/{id}',[\App\Http\Controllers\CmsController::class, 'edit'])->name('cms.edit');
Route::post('/cms/update/{id}',[\App\Http\Controllers\CmsController::class, 'update'])->name('cms.update');
Route::post('/cms/change_status',[\App\Http\Controllers\CmsController::class, 'change_status'])->name('cms.change_status');


//====================> Blog Management =========================
Route::get('/blog',[\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create',[\App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store',[\App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
Route::post('/blog/delete/{id}',[\App\Http\Controllers\BlogController::class, 'delete'])->name('blog.delete');
Route::get('/blog/show',[\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{id}',[\App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/update/{id}',[\App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
Route::post('/blog/change_status',[\App\Http\Controllers\BlogController::class, 'change_status'])->name('blog.change_status');

//====================> Contact Management =========================
Route::get('/contact',[\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/delete/{id}',[\App\Http\Controllers\ContactController::class, 'delete'])->name('contact.delete');
Route::get('/contact/show',[\App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');


//====================> Faq Management =========================
Route::get('/faq',[\App\Http\Controllers\FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/create',[\App\Http\Controllers\FaqController::class, 'create'])->name('faq.create');
Route::post('/faq/store',[\App\Http\Controllers\FaqController::class, 'store'])->name('faq.store');
Route::post('/faq/delete/{id}',[\App\Http\Controllers\FaqController::class, 'delete'])->name('faq.delete');
Route::get('/faq/show',[\App\Http\Controllers\FaqController::class, 'show'])->name('faq.show');
Route::get('/faq/edit/{id}',[\App\Http\Controllers\FaqController::class, 'edit'])->name('faq.edit');
Route::post('/faq/update/{id}',[\App\Http\Controllers\FaqController::class, 'update'])->name('faq.update');
Route::post('/faq/change_status',[\App\Http\Controllers\FaqController::class, 'change_status'])->name('faq.change_status');

//====================> Slider Management =========================
Route::get('/slider',[\App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create',[\App\Http\Controllers\SliderController::class, 'create'])->name('slider.create');
Route::post('/slider/store',[\App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');
Route::post('/slider/delete/{id}',[\App\Http\Controllers\SliderController::class, 'delete'])->name('slider.delete');
Route::get('/slider/show',[\App\Http\Controllers\SliderController::class, 'show'])->name('slider.show');
Route::get('/slider/edit/{id}',[\App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/{id}',[\App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');
Route::post('/slider/change_status',[\App\Http\Controllers\SliderController::class, 'change_status'])->name('slider.change_status');


//====================> Category Management =========================
Route::get('/category',[\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create',[\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store',[\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::post('/category/delete/{id}',[\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/show',[\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::get('/category/edit/{id}',[\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}',[\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

//====================> Category Management =========================
Route::get('/product',[\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/create',[\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product/store',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::post('/product/delete/{id}',[\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/show',[\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{id}',[\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}',[\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');