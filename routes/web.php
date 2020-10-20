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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('bailleurs', 'BailleursController');

    Route::resource('activites', 'ActivitesController');

    Route::resource('demandeurs', 'DemandeursController');

    Route::post('addLigne_activite', 'LigneActiviteController@addLigne_activite');

    Route::post('addBailleur', 'BailleursController@addBailleur');

    Route::resource('budgets', 'BudgetsController');

    Route::resource('ligne_activites', 'LigneActiviteController');

    Route::resource('budgets', 'BudgetsController');

    Route::resource('users', 'UsersController');

    Route::resource('roles', 'RolesController');

    Route::resource('responsable_activites', 'ResponsablesActivite');

    Route::put('update_demandeur/{demandeur}', 'DemandeursController@modifier_demandeur')->name('modifierdemandeur');

    Route::get('/getData', 'ActivitesController@getData');

    Route::get('justifications/create/{id}/{activite}', 'JustificationController@justification')->name('justification');

    Route::post('justification_store', 'JustificationController@justification_store')->name('justification_store');

    Route::get('interfacejustification', 'JustificationController@interfacejustification')->name('interfacejustification');

    Route::get('interfacedecaissement', 'DecaissementController@interfacedecaissement')->name('interfacedecaissement');

    Route::get('decaissement/create/{id}/{activite}', 'DecaissementController@decaissement')->name('decaissement');

    Route::post('decaissement_store', 'DecaissementController@decaissement_store')->name('decaissement_store');

    Route::get('show_decaissemen/t/{id}', 'DecaissementController@show')->name('show_decaissement');

    Route::get('show_activite/{activite}', 'ActivitesController@show_activite')->name('show_activite');

    Route::put('update_ligne_activite/{ligne_activite}', 'LigneActiviteController@modifier_ligneActivite')->name('modifierligneactivite');

    Route::get('ligne_activite_justifier', 'JustificationController@ligne_activite_justifier')->name('ligne_activite_justifier');

 });




