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
            Route::get('roles', 'RoleController@index')->name('roles');
            Route::resource('users','UserController');
            Route::get('users', 'UserController@index')->name('users');
            Route::resource('dashboard', 'AdminController');
            Route::get('dashboard', 'AdminController@index')->name('dashboard');
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
            Route::resource('/', 'JasaController');;
            Route::resource('/job', 'JobController');
            Route::resource('/kategori_servis', 'KategoriServisController');
        });
        Route::group(['prefix' => 'task'], function () {
            Route::resource('/', 'TaskController');
            Route::resource('/project', 'ProjectController');
            Route::resource('/servis', 'ServisController');
            Route::resource('/support', 'SupportController');
        });
        Route::group(['prefix' => 'produk'], function () {
            Route::resource('/', 'ProdukController');
            Route::resource('/kategori', 'KategoriProdukController');
        });

            Route::resource('/part', 'PartController');
            Route::get('part', 'PartController@index')->name('parts');
            Route::get('json/part', 'PartController@dataTable')->name('part.json');
            Route::get('excel', 'PartController@exportExcel')->name('export_part_xls');
            Route::get('csv', 'PartController@exportCsv')->name('export_part_csv');
            Route::post('part/delete-multiple', ['as'=>'part.multiple-delete','uses'=>'PartController@deleteMultiple']);

//Route Kategori Part
            Route::resource('kategori', 'KategoriController');
            Route::get('/part/kategori/list_part', 'KategoriController@index')->name('kats');
            Route::get('part/kategori/json', 'KategoriController@dataTable')->name('kats.json');
            Route::get('/part/kategori/export_excel', 'KategoriController@exportExcel')->name('export_kategori_xls');
            Route::get('part/kategori/export_csv', 'KategoriController@exportCsv')->name('export_kategori_csv');
            Route::post('part/kategori/delete-multiple', ['as'=>'kategori.multiple-delete','uses'=>'KategoriPartController@deleteMultiple']);

//Route Supplier
            Route::resource('/supplier', 'SupplierController');
            Route::get('/supplier', 'SupplierController@index')->name('suppliers');
            Route::get('/json/supplier', 'SupplierController@dataTable')->name('supplier.json');
            Route::get('export_excel/supplier', 'SupplierController@exportExcel')->name('exportExcelSupplier');
            Route::get('export_csv/supplier', 'SupplierController@exportCsv')->name('exportCsvSupplier');
//Route Leads
            Route::resource('/leads', 'LeadsController');
            Route::get('/leads', 'LeadsController@index')->name('leads');
            Route::get('/json/leads', 'LeadsController@dataTable')->name('lead.json');
            Route::get('export_excel/leads', 'LeadsController@exportExcel')->name('exportExcelLeads');
            Route::get('export_csv/leads', 'LeadsController@exportCsv')->name('exportCsvLeads');

    });  //End Route Admin Prefix
}); //End Route Auth Midleware
Route::get('/home', 'HomeController@index')->name('home');
