<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/jnjel', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Route::get('locale/{locale}', function($locale){

    Session::put('locale', $locale);

    return redirect()->back();
});

Route::get('auth/google', 'Auth\SocialController@googleRedirect')->name('auth.google');
Route::get('auth/google/callback', 'Auth\SocialController@loginWithGoogle');

Route::group(
    [
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale',
    ],
    function(){
        Route::resource('add_product', 'AddProductController', ['names' => 'product.add_product']);

        Route::get('/', 'IndexController@index')->name('indexPage');
        Route::get('/test', 'TestController@addTest')->name('addTest');
        Route::get('/login');
        Route::get('/register');
        Route::post('/pass_update', 'PersonalController@update_password')->name('pass_update');
        Route::resource('personal', 'PersonalController', ['names' => 'personal']);
        //Route::get('/reg_and_log', 'ProductController@show')->name('showProduct');
        Route::get('/category/{id}', 'ProductController@showCategory')->name('showCategory');
        Route::get('category/{cat}/{product_id}', 'ProductController@show')->name('showProduct');
        Route::post('/send/', 'SendMessageController@sendMessage')->name('sendMessage');
        Route::get('/messages', 'MessagesController@messages')->name('messages');
        Route::post('/sendIdForMessages', 'MessagesController@sendIdForMessages')->name('sendIdForMessages');

       // Route::post('/sendMessage', 'MessagesController@sendMessage')->name('sendMessageOnChat');

        Auth::routes();
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    }
);

