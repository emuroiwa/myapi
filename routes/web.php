<?php

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

/**Route for products */
Route::get('products', 'ProductController@index');

/**Route for auth API */
Route::post('auth', 'AuthController@auth');

/**Route for details user API */
Route::middleware('auth:api')->group(function(){
    Route::post('user/products', 'UserController@index');
});
