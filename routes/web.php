<?php

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VendorOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('homepage');
});

// Route::get('/welcome', function () {
//     return view('welcome');
// });



Route::name('admin.')->prefix('admin')->middleware('is_admin')->group(function () {
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/clients', AdminClientController::class,);
    Route::resource('/products', AdminProductController::class);
    Route::resource('/mails', MailController::class);
});

Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/admines', AdminController::class);
    Route::resource('/categories', CategoryContoller::class);
});


// Route::get('/image', function () {
//     return view('image');
// });
// Route::post('/image', function (Request $request) {
//     $imageName = $request->file('image')->getClientOriginalName() . "ayman";
//     $path = $request->file('image')->store("public/uploads/$imageName");

//     // $request->file('image')->store('public/images' . $imageName);

// });

//Route::get("/edit/{index}", [PostController::class,  "edit"]);
//Route::put("/update/{index}", [PostController::class,  "update"]);
//Route::delete("/delete/{index}", [PostController::class,  "destroy"]);

Auth::routes();

// Read -> (all types of users)
// cud -> (only vendors)
// ( only vendor can create or update or delete his post )
Route::resource('/posts', PostController::class);

// crud  (only vendor can make all of crud operation on it)
Route::resource('/products', ProductController::class)->middleware('is_vendor');

// categories routes
//  All users can only read
//  Vendor can assign it to his product while creation


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('/clients', ClientController::class)->middleware('is_vendor');
Route::resource('/vendors', VendorOrderController::class)->middleware('is_vendor');
Route::resource('/comments', CommentController::class);
Route::resource('/orders', OrderController::class)->middleware('auth');
Route::resource('/wishlist', WishlistController::class)->middleware('is_delivery');
Route::resource('/profiles', ProfileController::class)->except(['create', 'store', 'destroy']);

Route::resource('/mails', MailController::class);


Auth::routes();


Route::get('/test', function () {
    $users = User::all();
    // dd($users);
    // $user = Auth::user();
    // dd($user);
    return view('test', ['users' => $users]);
});


Route::post('/rate', [RatingController::class, 'store']);


// Route::post('/testawy/{id}', [PostController::class, 'storecomment']);



// Route::get('/profile', function () {
//     $users = Auth::user();
//     $posts =  $users->posts;
//     $comments = $users->comments;
//     return view('profile.index', compact('users', 'posts', 'comments'));
// })->middleware('auth');



/**Admin Route */

// Route::get('/users','Admin\UserController@index');
// Route::perfix('Admin')->group(function(){
//     Route::get('/users', [UserController::class, 'index']);

// });
// Route::get('/users', [UserController::class, 'index']);


// Route::prefix('admin')->group(function(){

// Route::resource('/users', UserController::class);
// Route::get('/users', [UserController::class, 'index']);
//     });

// Route::group(['prefix' => 'admin'], function () {
// //    Route::get('/users', [UserController::class, 'index']);
//    Route::resource('/users', UserController::class);
// });


// Route::group(['prefix' => 'admin','middleware'=>'is_admin'], function () {
//    Route::get('/users', [UserController::class, 'index']);
// //    Route::resource('/users', UserController::class);
// });




// adding group
Route::get('/dashboard', function () {
    return view('admins.dashboard');
})->middleware('is_admin');
// })->middleware('is_admin');

// Route::resource('/users', UserController::class)->middleware('is_admin');
// Route::resource('/categories', CategoryContoller::class)->middleware('is_admin');
