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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
        Route::resource('dashboard', 'AdminController');
    Route::group(['prefix' => 'post'], function () {
        Route::resource('/', 'PostController');
        Route::resource('/tags', 'TagsController');
        Route::resource('/kategori', 'KategoriPostController');
    });
    Route::group(['prefix' => 'team'], function () {
        Route::resource('/', 'TeamController');
        Route::resource('/departemen', 'DeptController');
        Route::resource('/devisi', 'DevisiController');
    });
    Route::group(['prefix' => 'jasa'], function () {
        Route::resource('/', 'JasaController');
        Route::resource('/project', 'ProjectController');
        Route::resource('/servis', 'ServisController');
        Route::resource('/job', 'JobController');
        Route::resource('/kategori_servis', 'KategoriServisController');
    });
    Route::resource('supplier', 'SupplierController');
    Route::resource('part', 'PartController');
    });
    Route::group(['prefix' => 'klien'], function () {
        Route::get('users/{id}','UserController@show');
    });
});
Route::get('/home', 'HomeController@index')->name('home');
