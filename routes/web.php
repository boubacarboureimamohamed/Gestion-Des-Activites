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
});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bailleurs', 'BailleursController');

Route::resource('activites', 'ActivitesController');

Route::resource('demandeurs', 'DemandeursController');

Route::resource('ligne_activites', 'LigneActiviteController');

Route::resource('budgets', 'BudgetsController');

Auth::routes();

Route::group(['middleware' => ['auth', 'verifier']], function() { });

