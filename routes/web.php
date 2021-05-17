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
Route::get('/','homedashController@index');
Route::get('/dashboardmy', 'homedashController@myfnc');
Route::get('/cancel', function () {           return view('cancel'); });

Route::get('/confirm/{id}', 'UploadfileController@index');
Route::post('uploadfile','UploadfileController@upload');

Route::group(['middleware' => ['get.menu']], function () {
    Route::get('/checktaxs', function () {           return view('dashboard.checktax'); });
    Route::resource('checktaxs', 'InputsController');

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/colors', function () {     return view('dashboard.colors'); });
        Route::get('/typography', function () { return view('dashboard.typography'); });
        Route::get('/charts', function () {     return view('dashboard.charts'); });
        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
        Route::get('/404', function () {        return view('dashboard.404'); });
        Route::get('/500', function () {        return view('dashboard.500'); });
        Route::prefix('base')->group(function () {
            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

            Route::get('/forms', function(){        return view('dashboard.base.forms'); });
            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
            Route::get('/navs', function(){         return view('dashboard.base.navs'); });

            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

            Route::get('/switches', function(){     return view('dashboard.base.switches'); });
            Route::get('/tables', function () {     return view('dashboard.base.tables'); });
            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
        });
        Route::prefix('buttons')->group(function () {
            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
            Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
        });
        Route::prefix('notifications')->group(function () {
            Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
            Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
            Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
        });
        Route::resource('manages', 'ManagesController');
        Route::resource('notes', 'NotesController');
        Route::resource('inputs', 'InputsController');
        Route::resource('lands', 'LandsController');
        Route::resource('buildings', 'BuildingsController');
        Route::resource('signs', 'TaxsignController');
//        Route::resource('reports', 'ReportsController');

        Route::resource('paytaxs', 'PaytaxsController');

        Route::get('paytaxs/{id}/lands', function(){          return view('dashboard.paytaxs.paytaxs_lands'); });
        Route::get('paytaxs/{id}/signs', function(){          return view('dashboard.paytaxs.paytaxs_signs'); });

        Route::get('payments', 'PaytaxsController@indexpayments');

        Route::get('addtax',             'InputsController@indexaddtax');


        Route::get('reports/{id}/pds1', 'ReportsController@print_pds1');
        Route::get('reports/pds1', 'ReportsController@index1');

        Route::get('reports/{id}/pds2', function(){          return view('dashboard.reports.print_pds2'); });
        Route::get('reports/pds2', 'ReportsController@index2');

        Route::get('reports/{id}/pds3', 'ReportsController@print_pds3');
        Route::get('reports/pds3', 'ReportsController@index3');

        Route::get('reports/{id}/pds4', function(){          return view('dashboard.reports.print_pds4'); });
        Route::get('reports/pds4', 'ReportsController@index4');

        Route::get('reports/{id}/pds6', 'ReportsController@print_pds6');
        Route::get('reports/pds6', 'ReportsController@index6');

        Route::get('reports/{id}/pds7', 'ReportsController@print_pds7');
        Route::get('reports/pds7', 'ReportsController@index7');

        Route::get('reports/{id}/pds8', function(){          return view('dashboard.reports.print_pds8'); });
        Route::get('reports/pds8', 'ReportsController@index8');


        Route::get('reports/{id}/pp1', 'ReportsController@print_pp1');
        Route::get('reports/pp1', 'ReportsController@indexpp1');

        Route::get('reports/{id}/pp3', 'ReportsController@print_pp3');
        Route::get('reports/pp3', 'ReportsController@indexpp3');

    });
    Auth::routes();

    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'editupdate'      => 'resource.editupdate',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {

        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'RolesController');
        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::any('/search',function(){
            $q = Input::get ( 'q' );
            $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
            if(count($user) > 0)
                return view('welcome')->withDetails($user)->withQuery ( $q );
            else return view ('welcome')->withMessage('No Details found. Try to search again !');
        });
        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });
    });
});
