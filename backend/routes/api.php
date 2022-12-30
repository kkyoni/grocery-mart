<?php

use App\Http\Controllers\API\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
Route::post('/login', [UsersController::class, 'login']);
Route::post('/sendOtp', [UsersController::class, 'sendOtp']);
Route::post('/checkoutsave', [UsersController::class, 'checkoutsave']);
Route::post('/checkoutsavecod', [UsersController::class, 'checkoutsavecod']);
Route::post('/payment', [UsersController::class, 'payment']);
Route::post('/verifyOtp', [UsersController::class, 'verifyOtp']);
Route::get('/getproducts', [UsersController::class, 'getproducts']);
Route::get('/gettopproducts', [UsersController::class, 'gettopproducts']);
Route::get('/getbrand', [UsersController::class, 'getbrand']);
Route::get('/getcategories', [UsersController::class, 'getcategories']);
Route::get('/getblog', [UsersController::class, 'getblog']);
Route::get('/singlecategorys/{id}', [UsersController::class, 'singlecategorys']);
Route::get('/singlebrand/{id}', [UsersController::class, 'singlebrand']);
Route::get('/singleproduct/{id}', [UsersController::class, 'singleproduct']);
Route::get('/userorder/{user_id}', [UsersController::class, 'userorder']);
Route::get('/singleuserorder/{id}', [UsersController::class, 'singleuserorder']);
Route::get('/useraddress/{id}', [UsersController::class, 'useraddress']);
Route::get('/usereditaddress/{address_id}', [UsersController::class, 'usereditaddress']);
Route::get('/useraddressdelete/{address_id}/{user_id}', [UsersController::class, 'useraddressdelete']);
Route::get('/useraddressselect/{address_id}/{user_id}', [UsersController::class, 'useraddressselect']);
Route::get('/productssingle/{id}', [UsersController::class, 'productssingle']);
Route::get('/productssorting/{sort}', [UsersController::class, 'productssorting']);
Route::get('/productsprice/{min}/{max}', [UsersController::class, 'productsprice']);
Route::get('/blog-detail/{id}', [UsersController::class, 'blogdetail']);
Route::post('/add-contact', [UsersController::class, 'addcontact']);
Route::post('/add-support', [UsersController::class, 'addsupport']);
Route::get('/site-logo', [UsersController::class, 'sitelogo']);
Route::get('/get-faq', [UsersController::class, 'getfaq']);
Route::post('/add-Comment', [UsersController::class, 'addcomment']);
Route::get('/get-Comment/{id}', [UsersController::class, 'getcomment']);
Route::post('/profile', [UsersController::class, 'profile']);
Route::post('/promocode', [UsersController::class, 'promocode']);
// });

// Route::post('/user-signup',[UsersController::class, 'userSignUp']);
// Route::get('/user/{email}',[UsersController::class, 'userDetail']);
// Route::get('/get-about',[CmsController::class, 'getabout']);
// Route::get('/get-faq',[FaqController::class, 'index']);
// Route::get('/get-chat',[ChatController::class, 'getchat']);
// Route::post('/profile',[UsersController::class, 'profile']);
// Route::post('/forgotPassword',[UsersController::class, 'forgotPassword']);
// Route::post('/images',[UsersController::class, 'images']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
