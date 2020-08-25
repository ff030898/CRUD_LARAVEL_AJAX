<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/admin', 'AuthController@dashboard')->name('admin');
Route::post('/login','AuthController@login')->name('login');

Route::get('/logout','AuthController@logout')->name('logout');

Route::post('/create', 'HomeController@create')->name('create');
Route::post('/update/{id}','HomeController@update')->name('update');
Route::get('/delete/{id}',['as'=>'delete', 'uses'=>'HomeController@destroy']);

Route::get('/profile', 'AuthController@profile')->name('profile');

Route::post('/ajax_upload/action/{id}', 'AjaxUploadController@action')->name('ajaxupload.action');


Route::get('/telefones', 'ContatosController@index')->name('telefones');
Route::get('/delete/tel/{telefone}','ContatosController@destroy')->name('delete.tel');

Route::get('/relatorio', 'PdfController@geraPdf')->name('relatorio');
Route::get('/relatorio2', 'PdfController@geraPdf2')->name('relatorio2');