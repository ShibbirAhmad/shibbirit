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

Route::get('/', function () {
    return view('site.index');
})->name('home');


Auth::routes();


//this group for admin 
Route::group(['as' => 'admin.','prefix' => 'admin' , 'namespace' => 'Admin', 'middleware'=> ['auth','admin']], function () {
    
     Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']);  


});


//this route group for author
Route::group(['as' => 'author.','prefix' => 'author' , 'namespace' => 'Author', 'middleware'=> ['auth','author']], function () {
    
    Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']);  


});










