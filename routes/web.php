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
Route::get('clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Route::get('/', 'mainController@index')->name('index');
Route::get('/imobiliaria', 'mainController@imobiliaria')->name('imobiliaria');
Route::get('/imoveis', 'mainController@imoveis')->name('imoveis');
Route::get('/anuncie', 'mainController@anuncie')->name('anuncie');
Route::get('/contato', 'mainController@contato')->name('contato');

Route::get('/email', 'emailController@email')->name('email');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('imobiliaria-dados/{dados}','voyagerController@index')->name('voyagerdados');
        Route::get('visualizar-imovel/{id}','voyagerController@visualizarImovel')->name('visualizarimovel');
        Route::get('pesquisa','voyagerController@pesquisarImovel')->name('filterImoveis');
        Route::get('pesquisaid','voyagerController@pesquisarId')->name('pesquisaid');
        Route::any('resultados','voyagerController@resultados')->name('resultados');
        Route::get('pdf/{id}','voyagerController@gerarpdf')->name('gerarpdf');
    });
});


// URL::forceScheme('https');

Auth::routes();


