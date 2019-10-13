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
    return view('frontend.welcome');


});
Route::get('/', 'FrontController@index');
Route::get('/team', 'FrontController@sectionTeam')->name('section.team');
Route::get('/services', 'FrontController@sectionServices')->name('section.services');
// Route::get('/', 'FrontController@section');
//Route::get('/services', 'FrontController@sectionOurServices');
//Route::get('/portofolio', 'FrontController@sectionPortofolio');

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

            Route::resource('part', 'PartController');
            Route::get('part', 'PartController@index')->name('parts');
            Route::get('json/part', 'PartController@dataTable')->name('part.json');
            Route::get('excel', 'PartController@exportExcel')->name('export_part_xls');
            Route::get('csv', 'PartController@exportCsv')->name('export_part_csv');
            Route::post('part/delete-multiple', ['as'=>'part.multiple-delete','uses'=>'PartController@deleteMultiple']);



//Route Portofolio

            Route::resource('portofolio', 'PortofolioController');
            Route::get('portofolio', 'PortofolioController@index')->name('portofolio');
            Route::get('json/portofolio', 'PortofolioController@dataTable')->name('portofolio.json');

//Route Sections

            Route::resource('sections', 'SectionController');
            Route::get('sections', 'SectionController@index')->name('sections');
            Route::get('json/sections', 'SectionController@dataTable')->name('sections.json');

//Route Team
            Route::resource('team', 'TeamController');
            Route::get('team', 'TeamController@index')->name('teams');
            Route::get('json/team', 'TeamController@dataTable')->name('team.json');
//Route Departemen
            Route::resource('bagian', 'BagianController');
            Route::get('/team/bagian/list_bagian', 'BagianController@index')->name('bagians');
            Route::get('/team/json/bagian', 'BagianController@dataTable')->name('bag.json');
//Route Devisi
            Route::resource('devisi', 'DevisiController');
            Route::get('/team/devisi/list-divs', 'DevisiController@index')->name('divs');
            Route::get('/team/json/div', 'DevisiController@dataTable')->name('div.json');

//Route Jasa
            Route::resource('jasa', 'JasaController');
            Route::get('jasa', 'JasaController@index')->name('jasas');
            Route::get('/json/jasa', 'JasaController@dataTable')->name('jasa.json');

//Route Jam
            Route::resource('jam', 'JamController');
            Route::get('/jasa/jam/list_jam', 'JamController@index')->name('jams');
            Route::get('jasa/json/jam', 'JamController@dataTable')->name('jam.json');

//Route Job
            Route::resource('job', 'JobController');
            Route::get('/jasa/job/list_job', 'JobController@index')->name('jobs');
            Route::get('/jasa/json/job', 'JobController@dataTable')->name('job.json');

//Route Categories
            Route::resource('categories', 'CategoriesController');
            Route::get('/jasa/categories/list_categories', 'CategoriesController@index')->name('cats');
            Route::get('/jasa/categories/json', 'CategoriesController@dataTable')->name('cats.json');

//Route Kategori Part
            Route::resource('kategori', 'KategoriController');
            Route::get('/part/kategori/list_part', 'KategoriController@index')->name('kats');
            Route::get('part/kategori/json', 'KategoriController@dataTable')->name('kats.json');
            Route::get('/part/kategori/export_excel', 'KategoriController@exportExcel')->name('export_kategori_xls');
            Route::get('part/kategori/export_csv', 'KategoriController@exportCsv')->name('export_kategori_csv');
            Route::post('part/kategori/delete-multiple', ['as'=>'kategori.multiple-delete','uses'=>'KategoriPartController@deleteMultiple']);

//Merk Part
            Route::resource('merk', 'MerkController');
            Route::get('/part/merk/list_merk', 'MerkController@index')->name('merks');
            Route::get('part/merk/json', 'MerkController@dataTable')->name('merk.json');

//Route Supplier
            Route::resource('supplier', 'SupplierController');
            Route::get('/supplier', 'SupplierController@index')->name('suppliers');
            Route::get('/json/supplier', 'SupplierController@dataTable')->name('supplier.json');
            Route::get('export_excel/supplier', 'SupplierController@exportExcel')->name('exportExcelSupplier');
            Route::get('export_csv/supplier', 'SupplierController@exportCsv')->name('exportCsvSupplier');
//Route Leads
            Route::resource('leads', 'LeadsController');
            Route::get('/leads', 'LeadsController@index')->name('leads');
            Route::get('/json/leads', 'LeadsController@dataTable')->name('lead.json');
            Route::get('export_excel/leads', 'LeadsController@exportExcel')->name('exportExcelLeads');
            Route::get('export_csv/leads', 'LeadsController@exportCsv')->name('exportCsvLeads');

    });  //End Route Admin Prefix
}); //End Route Auth Midleware
Route::get('/home', 'HomeController@index')->name('home');
