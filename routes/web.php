<?php

use App\Http\Controllers\Admin\AdminController;
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
})->name('site.home');

// Route::get('search', function () {
//     return view('search');
// })->name('site.search');

Route::get('chart', function () {
    return view('chart');
})->name('site.chart');

Route::get('blog', function () {
    return view('blog');
})->name('site.blog');

Route::get('rules', function () {
    return view('rules');
})->name('site.rules');

Route::get('job', function () {
    return view('job');
})->name('site.job');

//testing purpose
Route::get('test', function () {
    return view('test');
})->name('site.test');

// Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function() {
        return redirect('/admin/login');
    });

    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});
// Route::group(['prefix' => 'admin'], function () {
//     Auth::routes();
// });
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('admin/relationship', 'App\Http\Controllers\Admin\PersonController');

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

Route::resource('admin/user', 'App\Http\Controllers\Admin\AdminController');
Route::resource('admin/theme', 'App\Http\Controllers\Admin\ThemeController');
Route::resource('admin/page', 'App\Http\Controllers\Admin\PageController');
Route::resource('admin/blog', 'App\Http\Controllers\Admin\BlogController');


Route::resource('/search', 'App\Http\Controllers\user\SearchController');

Route::get('fetch-family-list','App\Http\Controllers\user\ChartController@fetchfamilylist');
// Route::get('/chart', [App\Http\Controllers\HomeController::class, 'index'])->name('chart');