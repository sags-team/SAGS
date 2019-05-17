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

Route::get('/', 'HomeController@index')->name('index');
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

//Rotas para uso de BankInfo
Route::get('/admin/branch/bankInfo', 'BankInfoController@list')->name('branch.bankInfo');
Route::get('/admin/branch/bankInfo/create', 'BankInfoController@create')->name('bankInfo.create');
Route::post('/admin/branch/bankInfo/store', 'BankInfoController@store')->name('bankinfo.store');
Route::get('/admin/branch/bankInfo/{id}/edit', 'BankInfoController@edit')->name('bankinfo.edit');
route::post('/admin/branch/bankInfo/update', 'BankInfoController@update')->name('bankinfo.update');
route::post('/admin/branch/bankInfo/delete', 'BankInfoController@destroy')->name('bankinfo.delete');

Route::get('/admin/denied', 'AdminController@denied')->name('admin.denied');
Route::get('/admin/alreadyExist', 'AdminController@alreadyExist')->name('admin.exist');
//fim de rotas referentes ao administrador

//Rotas para CRUD Branch
Route::get('/super/branch/create', 'BranchController@create')->name('branch.create');
Route::post('/super/branch/store', 'BranchController@store')->name('branch.store');
Route::post('/super/branch/delete', 'BranchController@destroy')->name('branch.delete');
Route::get('/super/branch/{id}/show', 'BranchController@show')->name('branch.show');
Route::get('/super/branch/{id}/edit', 'BranchController@edit')->name('branch.edit');
Route::get('/super/branch/list', 'BranchController@list')->name('branch.list');
Route::post('/super/branch/list', 'BranchController@search')->name('branch.search');
Route::post('/super/branch/update', 'BranchController@update')->name('branch.update');


Route::get('/super/alreadyExist', 'BranchController@alreadyExists')->name('branch.alreadyExists');
Route::get('/super/denied', 'SuperController@denied')->name('super.denied');
//Rotas para CRUD de usuário
Route::get('/super/user/create', 'UserController@create')->name('user.create');
Route::post('/super/user/store', 'UserController@store')->name('user.store');
Route::get('/super/user/list', 'UserController@list')->name('user.list');
route::get('/super/user/{id}/show', 'UserController@show')->name('user.show');
Route::get('/super/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::post('/super/user/update', 'UserController@update')->name('user.update');
Route::post('/super/user/delete', 'UserController@destroy')->name('user.delete');
Route::post('/super/user/list', 'UserController@search')->name('user.search');
//Route::put('/admin/affiliated/{id}/update', 'AffiliatedController@update')->name('affiliated.update');

//Route::get('/admin/affiliated/{id}/editar', 'AffiliatedController@editar')->name('affiliated.editar');

Route::get('/teste', 'HomeController@fileTest')->name('testando');

/*
Route::get('/admin', function(){
    return "Voce é administrador";
})->middleware(['auth', 'auth.admin']);

Route::get('/super', function(){
    return "voce é Super";
})->middleware(['auth', 'auth.super']);
*/
