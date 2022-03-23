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



// Route::get('search', function () {
//     return view('search');
// })->name('site.search');

// testing purpose
Route::get('test', function () {
    return view('test');
})->name('site.test');

// user route
Route::group(['namespace' => 'user'], function () {
    Route::get('summernote', function () {
        return view('user.summernote');
    });
    Route::get('chart', function () {
        return view('user.chart');
    })->name('user.chart');
    Route::get('blog', function () {
        return view('user.blog');
    })->name('user.blog');
    Route::get('rules', function () {
        return view('user.rules');
    })->name('user.rules');
    Route::get('job', function () {
        return view('user.job');
    })->name('user.job');
    Route::get('notice', function () {
        return view('user.notice');
    })->name('user.notice');
    Route::get('event', function () {
        return view('user.event');
    })->name('user.event');
    Route::get('/', function () {
        return view('user.home');
    })->name('user.home');
});

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
Route::resource('admin/job', 'App\Http\Controllers\Admin\JobController');


Route::resource('/search', 'App\Http\Controllers\user\SearchController');

Route::get('fetch-family-list','App\Http\Controllers\user\ChartController@fetchfamilylist');
Route::POST('downloadPDF','App\Http\Controllers\user\ChartController@downloadPDF');
// Route::get('/chart', [App\Http\Controllers\HomeController::class, 'index'])->name('chart');