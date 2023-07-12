<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();

Route::get('/', function () {
    return redirect(route('dashboard'));
})->name('home');

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check()) { }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');

Route::get('dossiers/treeview/{id}', 'App\Http\Controllers\DossiersController@treeview')->name('dossiers.treeview');

Route::get('famille/get_by_famille', 'App\Http\Controllers\FamilleController@getChilds')->name('famille.get_by_famille');

// Route::post('dossiers/navigate', 'App\Http\Controllers\DossiersController@ajaxRequest')->name('dossiers.navigate');

Route::match(['GET', 'POST'], 'dossiers/navigate', 'App\Http\Controllers\DossiersController@ajaxRequest')->name('dossiers.navigate');

Route::get('admin/catalogue', 'App\Http\Controllers\DashboardController@catalogue')->name('admin.catalogue');

Route::post('dossiers/navigate/details', 'App\Http\Controllers\DossiersController@ajaxDetails')->name('dossiers.navigate.details');

Route::post('dossiers/navigate/details/proprietes', 'App\Http\Controllers\DossiersController@ajaxProprietes')->name('dossiers.navigate.details.proprietes');

Route::get('proprietes/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\DossiersController@showProprietes')->name('proprietes.model');

Route::get('compositions/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\CompositionsController@model')->name('compositions.model');

Route::get('emballages/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_emballagesController@model')->name('emballages.model');

Route::get('ingredients/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_ingredientsController@model')->name('ingredients.model');

Route::get('allergenes/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_allergenesController@model')->name('allergenes.model');

Route::get('couts/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_coutController@model')->name('couts.model');


Route::get('physico_chimiques/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_physico_chimiqueController@model')->name('physico_chimiques.model');

Route::get('allegations/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_allegationsController@model')->name('allegations.model');

Route::get('listeProcesses/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Liste_processController@model')->name('liste_processes.model');

Route::get('nutriments/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_nutrimentController@model')->name('nutriments.model');

Route::get('materiaux/model/{id_model}/{id_site}/{id_dossier}/{dossier_parent}', 'App\Http\Controllers\Modele_nutrimentController@model')->name('materiaux.model');

Route::post('sites/delete', 'App\Http\Controllers\SitesController@delete')->name('sites.delete');

Route::post('dossiers/delete', 'App\Http\Controllers\DossiersController@delete')->name('dossiers.delete');

Route::post('site/member/add', 'App\Http\Controllers\SitesController@addMembers')->name('site.member.add');


