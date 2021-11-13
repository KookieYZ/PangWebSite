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
});

Route::get('search', function () {
    return view('search');
});

Route::get('chart', function () {
    return view('chart');
});

Route::get('blog', function () {
    return view('blog');
});

//testing purpose
Route::get('test', function () {
    return view('test');
});

// Auth::routes();
Route::group(['prefix' => 'admin'], function () {
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

