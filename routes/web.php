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
            Route::resource('/part', 'PartController')->except([
                'show'
            ]);
            Route::get('part', 'PartController@index')->name('parts');
            Route::get('excel', 'PartController@exportExcel')->name('export_part_xls');
            Route::get('csv', 'PartController@exportCsv')->name('export_part_csv');
            Route::post('part/delete-multiple', ['as'=>'part.multiple-delete','uses'=>'PartController@deleteMultiple']);
            Route::resource('/kategori', 'KategoriPartController');
            Route::get('part/kategori', 'KategoriPartController@index')->name('kats');
            Route::get('/part/kategori/export_excel', 'KategoriPartController@exportExcel')->name('export_kategori_xls');
            Route::get('part/kategori/export_csv', 'KategoriPartController@exportCsv')->name('export_kategori_csv');
            Route::post('part/kategori/delete-multiple', ['as'=>'kategori.multiple-delete','uses'=>'KategoriPartController@deleteMultiple']);


            Route::resource('supplier', 'SupplierController')->except([
                'show'
            ]);
            Route::get('/supplier', 'SupplierController@index')->name('suppliers');
            Route::get('supplier/json','SupplierController@dataTable')->name('supplier.json');
            Route::get('supplier/show','SupplierController@show');
            Route::get('supplier/destroy','SupplierController@destroy')->name('supplier.destroy');
            Route::post('delete-multiple-category', ['as'=>'supplier.multiple-delete','uses'=>'SupplierController@deleteMultiple']);
            Route::get('supplier/export_excel', 'SupplierController@exportExcel')->name('exporte');
            Route::get('supplier/export_csv', 'SupplierController@exportCsv')->name('exports');


            Route::resource('leads', 'LeadsController')->except([
                'show'
            ]);
            Route::get('leads', 'LeadsController@index')->name('leads');
            Route::post('delete-multiple', ['as'=>'leads.multiple-delete','uses'=>'LeadsController@deleteMultiple']);
            Route::get('leads/export_excel', 'LeadsController@exportExcel')->name('export_Leads_xls');
            Route::get('leads/export_csv', 'LeadsController@exportCsv')->name('export_Leads_csv');
            });

});
Route::get('/home', 'HomeController@index')->name('home');
