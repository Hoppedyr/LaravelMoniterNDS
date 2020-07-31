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

Route::get('/', 'AppController@index')->name('home');

Route::prefix('/{serverMainPageId}/serverMainPage')->group(function () {
    Route::get(
        '/',
        'AppController@serverMainPage'
    )->name('serverMainPage');

    Route::get(
        '/{serverDataPageId}/serverDataPage',
        'AppController@serverDataPage'
    )->name('serverDataPage');
});
