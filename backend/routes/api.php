<?php
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('/login',[UsersController::class, 'login']);
    Route::post('/sendOtp',[UsersController::class, 'sendOtp']);
    Route::post('/verifyOtp',[UsersController::class, 'verifyOtp']);
    Route::get('/getproducts',[UsersController::class, 'getproducts']);
    Route::get('/getbrand',[UsersController::class, 'getbrand']);
    Route::get('/getcategories',[UsersController::class, 'getcategories']);
    Route::get('/getblog',[UsersController::class, 'getblog']);
    Route::get('/singlecategorys/{id}',[UsersController::class, 'singlecategorys']);
    Route::get('/singlebrand/{id}',[UsersController::class, 'singlebrand']);
    Route::get('/singleproduct/{id}',[UsersController::class, 'singleproduct']);
    Route::get('/productssingle/{id}',[UsersController::class, 'productssingle']);
    Route::get('/productssorting/{sort}',[UsersController::class, 'productssorting']);
    Route::get('/productsprice/{min}/{max}',[UsersController::class, 'productsprice']);

    // Route::post('logout', 'UsersController@logout');
    // Route::post('refresh', 'UsersController@refresh');
    // Route::post('me', 'UsersController@me');
// });

// Route::post('/user-signup',[UsersController::class, 'userSignUp']);
// Route::post('/user-login',[UsersController::class, 'userLogin']);
// Route::get('/user/{email}',[UsersController::class, 'userDetail']);
// Route::post('/add-student',[StudentController::class, 'store']);
// Route::get('/get-student',[StudentController::class, 'index']);
// Route::get('/edit-student/{id}',[StudentController::class, 'edit']);
// Route::put('/update-student/{id}',[StudentController::class, 'update']);
// Route::delete('/delete-student/{id}',[StudentController::class, 'destory']);
// Route::get('/show-student/{id}',[StudentController::class, 'show']);
// Route::get('/get-blog',[BlogController::class, 'index']);
// Route::get('/blog',[BlogController::class, 'allBlog']);
// Route::get('/blog-detail/{id}',[BlogController::class, 'blogdetail']);

// Route::get('/get-about',[CmsController::class, 'getabout']);
// Route::post('/add-contact',[ContactController::class, 'store']);
// Route::get('/get-faq',[FaqController::class, 'index']);
// Route::get('/get-slider',[SliderController::class, 'index']);
// Route::get('/site-logo',[SettingController::class, 'sitelogo']);
// Route::get('/get-product',[ProductController::class, 'getproduct']);

// Route::get('/productdetail/{id}',[ProductController::class, 'productdetail']);

// Route::get('/get-cart/{id}',[CartController::class, 'getcart']);

// Route::get('/get-chat',[ChatController::class, 'getchat']);

// Route::post('/add-cart',[CartController::class, 'addcart']);
// Route::post('/profile',[UsersController::class, 'profile']);
// Route::post('/forgotPassword',[UsersController::class, 'forgotPassword']);
// Route::post('/images',[UsersController::class, 'images']);
// Route::get('/modellogin/{id}',[UsersController::class, 'modellogin']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
