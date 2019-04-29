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
    return view('auth.login');
});
Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
Route::get('/super/home', 'SuperController@home')->name('super.home');

Auth::routes();
// Rotas referentes ao administrador
Route::get('/admin/branch/information', 'AdminController@branchInformation')->name('branch.information');

Route::get('/admin/affiliated/create', 'AdminController@createAffiliated')->name('affiliated.create');
Route::post('/admin/affiliated/store', 'AffiliatedController@store')->name('affiliated.store');

Route::get('/admin/affiliated/{id}/edit', 'AffiliatedController@edit')->name('affiliated.edit');
Route::Post('/admin/affiliated/update', 'AffiliatedController@update')->name('affiliated.update');

Route::post('/admin/affiliated/delete', 'AffiliatedController@destroy')->name('affiliated.delete');
Route::get('/admin/affiliated/{id}/show','AffiliatedController@show')->name('affiliated.show');

Route::get('/admin/affiliated/list', 'AdminController@showAffiliates')->name('affiliates');
Route::post('/admin/affiliated/list', 'AdminController@searchAffiliates')->name('affiliates.search');

Route::get('/admin/denied', 'AdminController@denied')->name('admin.denied');
Route::get('/admin/alreadyExist', 'AdminController@alreadyExist')->name('admin.exist');
//fim de rotas referentes ao administrador

Route::get('/super/branch/create', 'BranchController@create')->name('branch.create');
Route::post('/super/branch/store', 'BranchController@store')->name('branch.store');

Route::get('/super/branch/{id}/show', 'BranchController@show')->name('branch.show');

//Route::put('/admin/affiliated/{id}/update', 'AffiliatedController@update')->name('affiliated.update');

//Route::get('/admin/affiliated/{id}/editar', 'AffiliatedController@editar')->name('affiliated.editar');

/*
Route::get('/admin', function(){
    return "Voce é administrador";
})->middleware(['auth', 'auth.admin']);

Route::get('/super', function(){
    return "voce é Super";
})->middleware(['auth', 'auth.super']);
*/
