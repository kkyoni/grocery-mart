<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\PasswordResetController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\OrderController;


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

Route::get('/clear-cache', static function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    Artisan::call('clear-compiled');
    Artisan::call('optimize:clear');
    return response()->json([
        'message' => 'All cache removed successfully.'
    ]);
});


Route::get('/', [HomeController::class, 'welcome']);
Route::group(['middleware' => 'preventBackHistory'], function () {
    Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'login']);
    Route::get('admin/resetPassword', [PasswordResetController::class, 'showPasswordRest'])->name('admin.resetPassword');
    Route::post('admin/sendResetLinkEmail', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.sendResetLinkEmail');
    Route::get('admin/find/{token}', [PasswordResetController::class, 'find'])->name('admin.find');
    Route::post('admin/create', [PasswordResetController::class, 'create'])->name('admin.sendLinkToUser');
    Route::post('admin/reset', [PasswordResetController::class, 'reset'])->name('admin.resetPassword_set');
    Route::any('admin/resend_link', [PasswordResetController::class, 'resend_link'])->name('admin.resend_link');

    Route::group(['prefix' => 'admin', 'middleware' => 'Admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        //====================> User Management <====================
        Route::get('/user', [UsersController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UsersController::class, 'update'])->name('user.update');
        Route::post('/user/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
        Route::get('/user/show', [UsersController::class, 'show'])->name('user.show');
        Route::post('/user/change_status', [UsersController::class, 'change_status'])->name('user.change_status');
        Route::get('/user/profile', [UsersController::class, 'updateProfile'])->name('user.profile');
        Route::post('/user/updateProfileDetail', [UsersController::class, 'updateProfileDetail'])->name('user.updateProfileDetail');
        Route::post('/user/updatePassword', [UsersController::class, 'updatePassword'])->name('user.updatePassword');
        Route::get('/user/activity_log/{id}', [UsersController::class, 'activitylog'])->name('user.activity_log');

        //====================> CMS Management =========================
        Route::get('/cms', [CmsController::class, 'index'])->name('cms.index');
        Route::post('/cms/delete/{id}', [CmsController::class, 'delete'])->name('cms.delete');
        Route::get('/cms/show', [CmsController::class, 'show'])->name('cms.show');
        Route::get('/cms/edit/{id}', [CmsController::class, 'edit'])->name('cms.edit');
        Route::post('/cms/update/{id}', [CmsController::class, 'update'])->name('cms.update');
        Route::post('/cms/change_status', [CmsController::class, 'change_status'])->name('cms.change_status');

        //====================> Blog Management =========================
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::post('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
        Route::post('/blog/load_data', [BlogController::class, 'load_data'])->name('blog.load_data');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::post('/blog/change_status', [BlogController::class, 'change_status'])->name('blog.change_status');

        //====================> Contact Management =========================
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
        Route::get('/contact/show', [ContactController::class, 'show'])->name('contact.show');


        //====================> Faq Management =========================
        Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
        Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
        Route::post('/faq/delete/{id}', [FaqController::class, 'delete'])->name('faq.delete');
        Route::get('/faq/show', [FaqController::class, 'show'])->name('faq.show');
        Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
        Route::post('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
        Route::post('/faq/change_status', [FaqController::class, 'change_status'])->name('faq.change_status');

        //====================> Category Management =========================
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::post('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
        Route::get('/categories/show', [CategoriesController::class, 'show'])->name('categories.show');
        Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');

        //====================> Category Management =========================
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/getbrand', [ProductController::class, 'getbrand'])->name('product.getbrand');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::post('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');

        //====================> Brand Management =========================
        Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/brand/getbrand', [BrandController::class, 'getbrand'])->name('brand.getbrand');
        Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
        Route::post('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('/brand/show', [BrandController::class, 'show'])->name('brand.show');
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');

        //====================> Promo Management =========================
        Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');
        Route::get('/promo/create', [PromoController::class, 'create'])->name('promo.create');
        Route::post('/promo/store', [PromoController::class, 'store'])->name('promo.store');
        Route::get('/promo/edit/{id}', [PromoController::class, 'edit'])->name('promo.edit');
        Route::post('/promo/update/{id}', [PromoController::class, 'update'])->name('promo.update');
        Route::post('/promo/delete/{id}', [PromoController::class, 'delete'])->name('promo.delete');
        Route::get('/promo/show', [PromoController::class, 'show'])->name('promo.show');

        //====================> Order Management =========================
        Route::get('/order', [OrderController::class, 'index'])->name('order.index');
        Route::post('/order/filter_by_button', [OrderController::class, 'index'])->name('order.filter_by_button');
        Route::get('/order/view/{id}', [OrderController::class, 'view'])->name('order.view');
    });
});
