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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teste', 'HomeController@teste')->name('layouts.layout');
Route::get('/admin/branch/information', 'AdminController@branchInformation')->name('branch.information');
Route::get('/admin/affiliated/create', 'AdminController@createAffiliated')->name('affiliated.create');
Route::get('/admin/affiliated/list', 'AdminController@showAffiliates')->name('affiliates');
Route::post('/admin/affiliated/store', 'AffiliatedController@store')->name('affiliated.store');
Route::get('/admin/affiliated/{id}/show','AffiliatedController@show')->name('affiliated.show');
Route::post('/admin/affiliated/delete', 'AffiliatedController@destroy')->name('affiliated.delete');

Route::put('/admin/affiliated/{id}/update', 'AffiliatedController@update')->name('affiliated.update');
Route::get('/admin/affiliated/criar', 'AffiliatedController@criar')->name('affiliated.criar');

Route::get('/admin/affiliated/{id}/editar', 'AffiliatedController@editar')->name('affiliated.editar');

Route::get('/admin', function(){
    return "Voce é administrador";
})->middleware(['auth', 'auth.admin']);