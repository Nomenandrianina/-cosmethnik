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

Route::post('dossiers/navigate', 'App\Http\Controllers\DossiersController@ajaxRequest')->name('dossiers.navigate');

Route::post('dossiers/navigate/details', 'App\Http\Controllers\DossiersController@ajaxDetails')->name('dossiers.navigate.details');
