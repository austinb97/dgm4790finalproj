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

Route::get('/', 'ProductController@welcome');
Route::post('/input', 'ProductController@store');
Route::get('/customerPage', 'ProductController@customerPage');
Route::get('/admin', 'ProductController@admin');
Route::post('/updateRoles', 'UroleController@updateRoles');
Route::get('/checkout/{product}', 'ProductController@show');
Route::post('/placeOrder', 'OrderController@store');
Route::get('/thanks', 'OrderController@thank');

Auth::routes();
Route::get('/createUrole', 'UroleController@store');
Route::get('/home', 'HomeController@index')->name('home');


// GET /posts
// GET /posts/create
// POST /posts
// GET /posts/{id}/edit
// GET /posts/{id}
// PATCH /posts/{id}
// DELETE /posts/{id}


//Route::get('/', 'PostsController@index');
// MVC LAYOUT & COMMANDS
//1.controller-> php artisan make:controller PostsController
//2.Eloquent model-> php artisan make:model Post
//3.migration-> php artisan make:migration create_posts_table--create=posts
//OR all 3 -> php artisan make:model Post -mc

