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

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/blog', 'FrontController@blog');
Route::get('/{slug}', 'FrontController@page');
Route::get('/{jasa}/tema', 'FrontController@tempelate');
Route::get('/{jasa}/tema/{slug}', 'FrontController@detailTempelate');

Route::get('/blog/read/post/{slug}',['uses' => 'FrontController@post', 'as' => 'blog.post']);
Route::get('/blog/read/post/share/{slug}',['uses' => 'FrontController@share', 'as' => 'blog.share']);
Route::get('blog/search/', ['uses' => 'FrontController@search', 'as' => 'search.post']);
Route::get('blog/categories/{slug}', ['uses' => 'FrontController@getCategories', 'as' => 'cat.post']);
Route::get('/servis/{id}/pdf', 'ServisController@getPdf')->name('servis.pdf');

//Sitemap
Route::get('/sitemap/index', 'SitemapController@index');
Route::get('/sitemap/blog', 'SitemapController@posts');

Route::get('/sitemap.xml', 'SitemapController@index');


Route::get('/team', 'FrontController@sectionTeam')->name('section.team');
Route::get('/services', 'FrontController@sectionServices')->name('section.services');
Route::get('/member/login', 'FrontController@getLogin')->middleware('guest')->name('login');
Route::get('/member/register', 'FrontController@getRegister')->middleware('guest')->name('register');
Route::get('/bantuan', 'FrontController@bantuan');
//Auth::routes();
Route::group(['middleware' => ['auth']], function() {

    //Route::get('laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    //Route::post('laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');

    // Route Tickets Front

    Route::get('/tickets/index', 'FrontController@tickets');
    Route::get('/tickets/{slug}', 'FrontController@getTickets');

    //Route Comments Front
    Route::post('item/servis/{servis_id}', ['uses' => 'ServisItemController@store', 'as' => 'serpis.store']);
    Route::post('comments/post/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
    Route::post('comments/tickets/{tickets_id}', ['uses' => 'CommentController@tickets', 'as' => 'comment.ticket']);
    Route::post('comments/reply/{comment_id}', ['uses' => 'CommentController@reply', 'as' => 'comment.reply']);

    Route::group(['prefix' => 'admin'], function () {
            Route::resource('roles','RoleController');
            Route::get('roles', 'RoleController@index')->name('roles');
            Route::resource('users','UserController');
            Route::get('users', 'UserController@index')->name('users');
            Route::resource('dashboard', 'AdminController');
            Route::get('dashboard', 'AdminController@index')->name('dashboard');

            // Route::post('/users/permission/create', 'UserController@addPermission')->name('users.add_permission');
            // Route::get('/users/permission/role_permission', 'UserController@rolePermission')->name('users.roles_permission');
            // Route::put('/users/permission/set/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');

        Route::resource('servis_item', 'ServisItemController');
        Route::get('servis_item', 'ServisItemController@deviceJson')->name('device.json');


//Route Tickets Prioritas
        Route::resource('prioritas', 'PrioritasController');
        Route::get('/tickets/prioritas/list_prioritas', 'PrioritasController@index')->name('prioritas');
        Route::get('/tickets/json/prioritas', 'PrioritasController@dataTable')->name('prioritas.json');

//Route Tickets Status
        Route::resource('status', 'StatusController');
        Route::get('/tickets/status/list_status', 'StatusController@index')->name('status');
        Route::get('/tickets/json/status', 'StatusController@dataTable')->name('status.json');

//Route Tickets Categories
        Route::resource('cats', 'CatsController');
        Route::get('/tickets/categories/list_categories', 'CatsController@index')->name('cats');
        Route::get('/tickets/json/categories', 'CatsController@dataTable')->name('cats.json');

//Route Tickets
        Route::resource('tickets', 'TicketsController');
        Route::get('tickets', 'TicketsController@index')->name('tickets');
        Route::get('json/tickets', 'TicketsController@dataTable')->name('tickets.json');
    //    Route::get('/api/ticket', 'Api\TicketApiController@index');


//Route Comment
        Route::resource('comments', 'CommentController');
        Route::get('/post/comments/list_comments', 'CommentController@index')->name('comments');

        Route::get('/post/json/comments', 'CommentController@dataTable')->name('comment.json');
//Route Post
            Route::resource('/post', 'PostController');
            Route::get('post', 'PostController@index')->name('posts');
            Route::get('post/create', 'PostController@add')->name('posts.add');
            Route::get('json/posts', 'PostController@dataTable')->name('posts.json');
            Route::post('post/image_upload', 'PostController@upload')->name('upload');


//Route Tags
            Route::resource('tags', 'TagsController');
            Route::get('/post/tags/list_tags', 'TagsController@index')->name('tags');
            Route::get('/post/json/tags', 'TagsController@dataTable')->name('tags.json');



//Route Category
            Route::resource('postkategori', 'KategoriPostController');
            Route::get('/post/kategori/list_kategori_post', 'KategoriPostController@index')->name('categorys');
            Route::get('/post/json/kategori', 'KategoriPostController@dataTable')->name('category.json');




        Route::group(['prefix' => 'task'], function () {
            Route::resource('/', 'TaskController');
            Route::resource('/project', 'ProjectController');

            Route::resource('/support', 'SupportController');
        });
            Route::resource('part', 'PartController');
            Route::get('part', 'PartController@index')->name('parts');
            Route::get('json/part', 'PartController@dataTable')->name('part.json');
            Route::get('excel', 'PartController@exportExcel')->name('export_part_xls');
            Route::get('csv', 'PartController@exportCsv')->name('export_part_csv');
            Route::post('part/delete-multiple', ['as'=>'part.multiple-delete','uses'=>'PartController@deleteMultiple']);

// Route Servis
            Route::resource('/servis', 'ServisController');
            Route::get('servis', 'ServisController@addDevice')->name('device');
            Route::get('servis', 'ServisController@index')->name('servis');
            Route::get('json/servis', 'ServisController@dataTable')->name('servis.json');



// Route Garansi

            Route::resource('garansi', 'GaransiController');
            Route::get('/servis/garansi/list_garansi', 'GaransiController@index')->name('garans');
            Route::get('/servis/json/garansi', 'GaransiController@dataTable')->name('garansi.json');

// Route Kelengkapan

            Route::resource('kelengkapan', 'KelengkapanController');
            Route::get('/servis/kelengkapan/list_kelengkapan', 'KelengkapanController@index')->name('kelengkapans');
            Route::get('servis/json/kelengkapan', 'KelengkapanController@dataTable')->name('kelengkapan.json');


//Route Portofolio

            Route::resource('portofolio', 'PortofolioController');
            Route::get('portofolio', 'PortofolioController@index')->name('portofolio');
            Route::get('json/portofolio', 'PortofolioController@dataTable')->name('portofolio.json');

//Route Portofolio

            Route::resource('galery', 'GaleryController');
            Route::get('galery', 'GaleryController@index')->name('galery');
            Route::get('json/galery', 'GaleryController@dataTable')->name('galery.json');
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
            Route::get('/jasa/categories/list_categories', 'CategoriesController@index')->name('catrs');
            Route::get('/jasa/categories/json', 'CategoriesController@dataTable')->name('catrs.json');

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

//Model Part

            Route::resource('models', 'ModelsController');
            Route::get('/part/models/list_models', 'ModelsController@index')->name('models');
            Route::get('/part/models/json', 'ModelsController@dataTable')->name('models.json');

//Route Pelanggan
            Route::resource('pelanggan', 'PelangganController');
            Route::get('/pelanggan', 'PelangganController@index')->name('pelanggan');
            Route::get('/json/pelanggan', 'PelangganController@dataTable')->name('pelanggan.json');
            Route::get('export_excel/pelanggan', 'PelangganController@exportExcel')->name('exportExcelPelanggan');
            Route::get('export_csv/pelanggan', 'PelangganController@exportCsv')->name('exportCsvPelanggan');


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
    Route::group(['prefix' => 'member'], function () {
        Route::get('/clientarea', 'HomeController@index')->name('home');
    });
}); //End Route Auth Midleware


Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
