<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\OrderDetailController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=>'nouser'],function(){
    Route::redirect('/','/login');
    Route::get('/login',[UserController::class,'loginPage'])->name('loginPage');
    Route::get('/register',[UserController::class,'registerPage'])->name('registerPage');
    Route::post('/logout',[UserController::class,'logoutUser'])->name('logout');

    Route::post('/loginUser',[UserController::class,'loginUser'])->name('loginUser');

    Route::post('/registerAdmin',[UserController::class,'registerAdmin'])->name('registerAdmin');
    Route::post('/registerCustomer',[UserController::class,'registerCustomer'])->name('registerCustomer');
    Route::post('/registerDelivaryman',[UserController::class,'registerDelivaryman'])->name('registerDelivaryman');
    Route::post('/registerResturant',[UserController::class,'registerResturant'])->name('registerResturant');
});

Route::group(['middleware'=>'userexist'],function(){
    Route::group(['prefix'=>'/admin','middleware'=>'adminauth'],function(){
        Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('adminDashboard');
        Route::get('/profile',[AdminController::class,'adminProfile'])->name('adminProfile');
        Route::group(['prefix'=>'/account'],function(){
            Route::get('/list/{role}',[UserController::class,'userList'])->name('userList');
            Route::get('/view/{id}',[UserController::class,'userAccount'])->name('userAccount');
            Route::get('/edit/{id}',[UserController::class,'userEdit'])->name('userEdit');
            Route::put('/update/{id}',[UserController::class,'userUpdate'])->name('userUpdate');
            Route::get('/changepasswordPage',[UserController::class,'changepasswordPage'])->name('changepasswordPage');
            Route::put('/changepassword',[UserController::class,'changepassword'])->name('changepassword');
        });
        Route::group(['prefix'=>'/category'],function(){
            Route::get('/list',[CategoryController::class,'adminCategoryList'])->name('adminCategoryList');
            Route::get('/search',[CategoryController::class,'searchCategory'])->name('searchCategory');
            Route::post('/create',[CategoryController::class,'adminCategoryCreate'])->name('adminCategoryCreate');
            Route::get('/detail/{id}',[CategoryController::class,'adminCategoryDetail'])->name('adminCategoryDetail');
            Route::get('/delete/{id}',[CategoryController::class,'adminCategoryDelete'])->name('adminCategoryDelete');
            Route::get('/edit/{id}',[CategoryController::class,'adminCategoryEdit'])->name('adminCategoryEdit');
            Route::post('/update/{id}',[CategoryController::class,'adminCategoryUpdate'])->name('adminCategoryUpdate');
        });
        Route::group(['prefix'=>'/product'],function(){
            Route::get('/list',[ProductController::class,'adminProductList'])->name('adminProductList');
            Route::post('/create',[ProductController::class,'adminProductCreate'])->name('adminProductCreate');
            Route::get('/detail/{id}',[ProductController::class,'adminProductDetail'])->name('adminProductDetail');
            Route::get('/delete/{id}',[ProductController::class,'adminProductDelete'])->name('adminProductDelete');
            Route::get('/edit/{id}',[ProductController::class,'adminProductEdit'])->name('adminProductEdit');
            Route::post('/update/{id}',[ProductController::class,'adminProductUpdate'])->name('adminProductUpdate');
        });
        Route::group(['prefix'=>'/order'],function(){
            Route::get('/list',[OrderController::class,'adminOrderList'])->name('adminOrderList');

        });
    });
});


// Route::get('/category_list',[CategoryController::class,'categoryAll'])->name('category_list');

// //Auth middleware
// Route::get('/dashboard',[UserController::class,'condition'])->name('dashboard');
// Route::group(['prefix'=>'/admin'],function(){
//     Route::get('/home',[AdminController::class,'adminHome'])->name('adminHome');
// });
// Route::group(['prefix'=>'/customer'],function(){
//     Route::get('/home',[CustomerController::class,'customerHome'])->name('customerHome');
// });
// Route::group(['prefix'=>'/resturant'],function(){
//     Route::get('/home',[ResturantController::class,'resturantHome'])->name('resturantHome');
// });
// Route::group(['prefix'=>'/delivary'],function(){
//     Route::get('/home',[DelivaryController::class,'delivaryHome'])->name('delivaryHome');
// });

// // Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
// Route::middleware(['auth'])
// ->group(function () {
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard');

//         // Route::get('/lout',function(){
//         //     return view('lout');
//         // });

//         // Route::group(['prefix'=>'/category'],function(){
//         //     Route::get('/list',[CategoryController::class,'categorylist'])->name('list');
//         // });

//         // Route::get('/lout',function(){
//         //     return view('lout');
//         // });


//         //USER
//         Route::group(['prefix'=>'/user','middleware'=>'userauth'],function(){

//             Route::get('/home',[UserController::class,'userHome'])->name('userHome');
//             Route::redirect('/','/home');
//             Route::get('/cart',[UserController::class,'userCart'])->name('userCart');
//             Route::get('/cart/save',[UserController::class,'saveCart'])->name('saveCart');
//             Route::get('/history',[UserController::class,'historyPage'])->name('historyPage');

//             Route::get('/filter/{id}',[UserController::class,'filterCat'])->name('filterCat');

//             Route::get('/passwordChange',[UserController::class,'passwordChange'])->name('changePassword');
//             Route::post('/passwordUpdate',[UserController::class,'passwordUpdate'])->name('updatePassword');
//             Route::get('/profile',[UserController::class,'profile'])->name('user#account');
//             Route::get('/editProfile',[UserController::class,'editUserProfile'])->name('editUserProfile');
//             Route::post('/updateUser',[UserController::class,'updateUser'])->name('updateUser');
//             // Route::get('/viewCount',[ViewProductController::class,'viewCount']);
//             // Route::get('/love',[ViewProductController::class,'love']);
//             // Route::get('/loveClick',[ViewProductController::class,'loveClick']);


//             Route::group(['prefix'=>'/order'],function(){
//                 Route::get('/cart',[CartController::class,'cartPage'])->name('cartPage');
//                 Route::get('/addToCart',[AjaxController::class,'addToCart'])->name('addToCart');
//                 Route::get('/cartAmount',[AjaxController::class,'cartAmount']);
//             });

//             Route::group(['prefix'=>'/pizza'],function(){
//                 Route::get('/detail/{id}',[UserController::class,'pizzaDetail'])->name('pizzaDetail');
//             });

//             Route::group(['prefix'=>'/ajax'],function(){
//                 Route::get('/pizza/list',[AjaxController::class,'pizzaList'])->name('pizzaList');
//                 Route::get('/pizza/category',[AjaxController::class,'pizzaCat'])->name('pizzaCat');
//                 Route::get('/pizza/orderCat',[AjaxController::class,'pizzaOrderCat'])->name('pizzaOrderCat');
//                 Route::get('/pizza/orderList',[AjaxController::class,'pizzaOrderList'])->name('orderList');
//                 Route::get('/pizza/order/payment',[AjaxController::class,'orderPayment'])->name('payment');
//             });
//         });

//         // Route::group(['prefix'=>'/user','middleware' => 'userauth'],function(){});

//         //ADMIN
//         Route::group(['prefix'=>'/admin','middleware'=>'adminauth'],function(){

//             // Route::post('/category_list',[CategoryController::class,'categoryAll'])->name('category_list');

//             // Route::get('/categorydata',function(){
//             //     return view('admin.category');
//             // });

//             Route::get('/customerlist',function(){
//                 return view('admin.customerlist');
//             })->name('customerlist');

//             Route::get('/category_create',function(){
//                 return view('admin.category.category_create');
//             })->name('category_create');

//             //CategoryCtrl
//             Route::post('/creation',[CategoryController::class,'creation'])->name('categoryCreate');
//             Route::get('/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
//             Route::get('/editCategory/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
//             Route::post('/updateCategory/{id}',[CategoryController::class,'updateCategory'])->name('updateCategory');
//             Route::get('/viewCategory/{id}',[CategoryController::class,'viewCategory'])->name('viewCategory');
//             Route::get('/searchCategory',[CategoryController::class,'searchCategory'])->name('searchCategory');

//             //Adminctrl
//             Route::get('/changepasswordPage',[AdminController::class,'changepasswordPage'])->name('changepasswordPage');
//             Route::post('/changepassword',[AdminController::class,'changepassword'])->name('changepassword');
//             Route::get('/profile',[AdminController::class,'profile'])->name('profile');
//             Route::get('/editProfile',[AdminController::class,'editProfile'])->name('editProfile');
//             Route::post('/updateAdmin',[AdminController::class,'updateAdmin'])->name('updateAdmin');
//             //create

//             //ProductCtrl
//             //Route::get('')->name('');

//             //adminlist
//             Route::get('/adminlist',[AdminController::class,'adminlist'])->name('admin#list');
//             Route::get('/deleteAdmin/{id}',[AdminController::class,'deleteAdmin'])->name('deleteAdmin');
//             Route::get('/roleChangePage/{id}',[AdminController::class,'roleChangePage'])->name('roleChangePage');
//             Route::post('/roleChange/{id}',[AdminController::class,'roleChange'])->name('roleChange');

//             //userlist
//             Route::get('/userlist',[AdminController::class,'userList'])->name('userList');
//             Route::get('/userRoleUp',[AdminController::class,'userRoleUp']);
//             Route::get('/userDelete',[AdminController::class,'userDelete']);
//             Route::get('/detailUser/{id}',[AdminController::class,'detailUser'])->name('detailUser');


//             Route::get('/product',[ProductController::class,'productPage'])->name('productlist');
//             Route::get('/product/create',[ProductController::class,'productCreate'])->name('productcreate');
//             Route::post('/product/productCreate',[ProductController::class,'product_create'])->name('productCreate');
//             Route::get('/product/viewProduct/{id}',[ProductController::class,'product_view'])->name('viewProduct');
//             Route::get('/product/editProduct/{id}',[ProductController::class,'product_edit'])->name('editProduct');
//             Route::get('/product/deleteProduct/{id}',[ProductController::class,'product_delete'])->name('deleteProduct');
//             Route::post('/product/updateProduct',[ProductController::class,'product_update'])->name('updateProduct');
//             // Route::get('/product/searchProduct',[ProductController::class,'product_search'])->name('searchProduct');

//             // OrderList
//             Route::get('/order/list',[OrderController::class,'userorderlist'])->name('userorderlist');
//             Route::get('/order/voucher/{id}',[OrderDetailController::class,'viewVoucher'])->name('viewVoucher');
//             Route::group(['prefix'=>'ajax/'],function(){
//                 Route::get('/order/status',[AjaxController::class,'statusChange'])->name('statusChange');
//                 Route::get('/order/admit',[AjaxController::class,'admitChange'])->name('admitChange');
//             });
//         });
//     }
// );

// Route::group(['middleware'=>'accountauth'],function(){
//     Route::redirect('/','/loginPage');
//     Route::get('/loginPage',[AuthController::class,'loginPage'])->name('authLoginPage');
//     Route::get('/registerPage',[AuthController::class,'registerPage'])->name('authRegisterPage');
// });



// Route::get('/successPassChange',[AuthController::class,'successPassChange'])->name('successPassChange');
// // Route::group(['prefix'=>'/customer'],function(){
// // });
// // Route::group(['prefix'=>'/admin'],function(){
// // });

// // Route::group(['prefix'=>'customer'],function(){
// //     Route::get('/home',function(){
// //         view('customer/home');
// //     })->name('customerHome');
// // });
