<?php

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
// Route::get('index',[
//     'as' => 'trang-chu',
//     'users' => 'PageController@getIndex'
// ]);
Route::get('/', 'PageController@getIndex')->name('trang-chu');

Route::get('product_type/all','PageController@Product_all')->name('type.all');
Route::get('/product_type/{type?}','PageController@getProduct_Type')->name('product_type');

Route::get('/product/{id?}','PageController@getProduct')->name('product');

Route::get('/contact','PageController@getContact')->name('contacts');

Route::get('/about','PageController@getAbout')->name('about');

Route::get('/addtocart/{id?}','PageController@getAddToCart')->name('addtocart');
Route::post('/add-to-cart','PageController@AddToCart');



Route::get('/delete-cart/{id?}','PageController@getDeleteCart')->name('deletecart');

Route::get('/checkout','PageController@getCheckout')->name('checkout');

Route::post('/order','PageController@postOrder')->name('order');

// Route::get('/order2','PageController@getOrder')->name('order2');

Route::get('/pagelogin','PageController@getPageLogin')->name('pagelogin');

Route::post('/login','PageController@postLogin')->name('login');

Route::get('/page-signup','PageController@getPageSignup')->name('page-signup');

Route::post('/signup','PageController@postSignup')->name('signup');

Route::get('/logout','PageController@getLogout')->name('logout');

Route::get('/search','PageController@getSearch')->name('search');



//admin
Route::get('/admin','AdminController@getAdmin')->name('admin')->middleware(['role:admin']);

Route::prefix('admin')->group(function (){
    Route::prefix('categories')->group(function () {
        Route::get('/', 'AdminCategoryController@getIndex')->name('categories.index')->middleware('can:list_category');
        Route::get('/create', 'AdminCategoryController@getCreate')->name('categories.create')->middleware('can:create_category');
        Route::post('/store', 'AdminCategoryController@postCategoryStore')->name('categories.store');
        Route::get('/edit/{id?}', 'AdminCategoryController@getEdit')->name('categories.edit')->middleware('can:update_category');
        Route::get('/delete/{id?}', 'AdminCategoryController@getDelete')->name('categories.delete')->middleware('can:delete_category');
        Route::post('/update/{id?}', 'AdminCategoryController@getUpdate')->name('categories.update');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', 'AdminProductController@getProduct')->name('product.index')->middleware('can:list_product');
        Route::get('create', 'AdminProductController@getCreateProduct')->name('product.create')->middleware('can:create_product');
        Route::post('store', 'AdminProductController@postProductStore')->name('product.store');
        Route::get('delete/{id?}', 'AdminProductController@getProductDelete')->name('product.delete')->middleware('can:delete_product');
        Route::get('edit/{id?}', 'AdminProductController@getProductEdit')->name('product.edit')->middleware('can:update_product');
        Route::post('update/{id?}', 'AdminProductController@postUpdateProduct')->name('product.update');
    });
    Route::prefix('slide')->group(function(){
        Route::get('/', 'AdminSlideController@getSlide')->name('slide.index')->middleware('can:list_slide');
        Route::get('create', 'AdminSlideController@getSlideCreate')->name('slide.create')->middleware('can:list_slide');
        Route::post('store','AdminSlideController@postSlideStore')->name('slide.store');
        Route::get('edit/{id?}','AdminSlideController@getSlideEdit')->name('slide.edit')->middleware('can:update_slide');
        Route::post('update/{id?}','AdminSlideController@postSlideUpdate')->name('slide.update');;
        Route::get('dalete/{id?}','AdminSlideController@postSlideDelete')->name('slide.delete')->middleware('can:delete_slide');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', 'AdminUserController@index')->name('users.index')->middleware('can:list_user');
        Route::get('/create', 'AdminUserController@create')->name('users.create')->middleware('can:list_user');
        Route::post('/store', 'AdminUserController@store')->name('users.store');
        Route::get('/edit/{id?}', 'AdminUserController@edit')->name('users.edit')->middleware('can:list_user');
        Route::post('/update/{id?}', 'AdminUserController@update')->name('users.update');
        Route::get('/delete/{id?}', 'AdminUserController@delete')->name('users.delete')->middleware('can:list_user');
    });
    Route::prefix('roles')->group(function(){
        Route::get('/', 'AdminRoleController@index')->name('roles.index')->middleware('can:list_role');
        Route::get('/create', 'AdminRoleController@create')->name('roles.create')->middleware('can:create_role');
        Route::post('/store', 'AdminRoleController@store')->name('roles.store');
        Route::get('/edit/{id?}', 'AdminRoleController@edit')->name('roles.edit')->middleware('can:list_user');
        Route::post('/update/{id?}', 'AdminRoleController@update')->name('roles.update');
        Route::get('/delete/{id?}', 'AdminRoleController@delete')->name('roles.delete')->middleware('can:delete_role');

    });
    Route::prefix('bills')->group(function(){
        Route::get('/','AdminBillController@index')->name('admin.bill.index');
        Route::get('details/{id?}','AdminBillController@details')->name('admin.bill.details');
    });
});
Route::prefix('comment')->group(function(){
    Route::post('delete','CommentController@delete')->name('comment.delete');
    Route::post('/load-comment','CommentController@load_comment')->name('comment.show');
    Route::post('/send-comment','CommentController@send_comment')->name('comment.send')->middleware('comment');
});

//profile
Route::get('profile-index/{id?}','UserController@profile_index')->name('user.profile.index');
Route::get('profile-edit/{id?}','UserController@profile_edit_page')->name('user.page.edit');
Route::post('profile-img/{id?}','UserController@profile_img')->name('profile.img');
Route::post('update-imformation/{id?}','UserController@update_imformation')->name('update.profile.imformation');

Route::post('bill-details/{id?}','UserController@bill_detail')->name('bill.details');
Route::post('update-password','UserController@update_password')->name('password.update');

//Mail
Route::get('send-mail','MailController@send_mail')->name('mail.send');
Route::get('forget-password','MailController@forget_password')->name('password.forget');
Route::post('re-password','MailController@re_password')->name('password.re');
Route::get('/page-update-pass','MailController@page_update_pass')->name('page.update.pass');
Route::post('mail-update-password','MailController@mail_update_password')->name('mail.update_pass');

//login facebook
Route::get('login/facebook','PageController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback','PageController@handleFacebookCallback')->name('callback.facebook');


//login google
Route::get('login/google', 'PageController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'PageController@handleGoogleCallback')->name('callback.google');
