<?php

use App\Http\Controllers\API\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

Route::get('/single-categorys/{id}', [CommonController::class, 'singlecategorys'])->middleware(['UnderMaintenance']);
Route::get('/single-brand/{id}', [CommonController::class, 'singlebrand'])->middleware(['UnderMaintenance']);
Route::get('/single-product/{id}', [CommonController::class, 'singleproduct'])->middleware(['UnderMaintenance']);
Route::get('/single-user-order/{id}', [CommonController::class, 'singleuserorder'])->middleware(['UnderMaintenance']);
Route::get('/user-order/{user_id}', [CommonController::class, 'userorder'])->middleware(['UnderMaintenance']);
Route::get('/user-address/{id}', [CommonController::class, 'useraddress'])->middleware(['UnderMaintenance']);
Route::get('/user-address-delete/{address_id}/{user_id}', [CommonController::class, 'useraddressdelete'])->middleware(['UnderMaintenance']);
Route::get('/user-address-select/{address_id}/{user_id}', [CommonController::class, 'useraddressselect'])->middleware(['UnderMaintenance']);
Route::get('/user-edit-address/{address_id}', [CommonController::class, 'usereditaddress'])->middleware(['UnderMaintenance']);
Route::get('/products-single/{id}', [CommonController::class, 'productssingle'])->middleware(['UnderMaintenance']);
Route::get('/products-sorting/{sort}', [CommonController::class, 'productssorting'])->middleware(['UnderMaintenance']);
Route::get('/products-price/{min}/{max}', [CommonController::class, 'productsprice'])->middleware(['UnderMaintenance']);
Route::get('/blog-detail/{id}', [CommonController::class, 'blogdetail'])->middleware(['UnderMaintenance']);
Route::get('/get-Comment/{id}', [CommonController::class, 'getcomment'])->middleware(['UnderMaintenance']);
Route::get('/get-faq', [CommonController::class, 'getfaq'])->middleware(['UnderMaintenance']);
Route::get('/get-blog', [CommonController::class, 'getblog'])->middleware(['UnderMaintenance']);
Route::get('/get-products', [CommonController::class, 'getproducts'])->middleware(['UnderMaintenance']);
Route::get('/get-brand', [CommonController::class, 'getbrand'])->middleware(['UnderMaintenance']);
Route::get('/get-categories', [CommonController::class, 'getcategories'])->middleware(['UnderMaintenance']);
Route::get('/get-top-products', [CommonController::class, 'gettopproducts'])->middleware(['UnderMaintenance']);
Route::get('/get-sitelogo', [CommonController::class, 'sitelogo'])->middleware(['UnderMaintenance']);

//Post Method
Route::post('/login', [CommonController::class, 'login'])->middleware(['UnderMaintenance']);
Route::post('/sendOtp', [CommonController::class, 'sendOtp'])->middleware(['UnderMaintenance']);
Route::post('/checkoutsavecod', [CommonController::class, 'checkoutsavecod'])->middleware(['UnderMaintenance']);
Route::post('/stripe_payment', [CommonController::class, 'stripe_payment'])->middleware(['UnderMaintenance']);
Route::post('/paypal_payment', [CommonController::class, 'paypal_payment'])->middleware(['UnderMaintenance']);
Route::post('/verifyOtp', [CommonController::class, 'verifyOtp'])->middleware(['UnderMaintenance']);
Route::post('/add-contact', [CommonController::class, 'addcontact'])->middleware(['UnderMaintenance']);
Route::post('/add-support', [CommonController::class, 'addsupport'])->middleware(['UnderMaintenance']);
Route::post('/add-Comment', [CommonController::class, 'addcomment'])->middleware(['UnderMaintenance']);
Route::post('/profile', [CommonController::class, 'profile'])->middleware(['UnderMaintenance']);
Route::post('/promocode', [CommonController::class, 'promocode'])->middleware(['UnderMaintenance']);
Route::post('/add-address', [CommonController::class, 'addaddress'])->middleware(['UnderMaintenance']);
Route::post('/track-now/{id}', [CommonController::class, 'tracknow'])->middleware(['UnderMaintenance']);
// });

// Route::get('/site-logo', [CommonController::class, 'sitelogo']);
// Route::post('/user-signup',[CommonController::class, 'userSignUp']);
// Route::get('/user/{email}',[CommonController::class, 'userDetail']);
// Route::get('/get-about',[CmsController::class, 'getabout']);
// Route::get('/get-faq',[FaqController::class, 'index']);
// Route::get('/get-chat',[ChatController::class, 'getchat']);
// Route::post('/profile',[CommonController::class, 'profile']);
// Route::post('/forgotPassword',[CommonController::class, 'forgotPassword']);
// Route::post('/images',[CommonController::class, 'images']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
