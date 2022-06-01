<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SearchController;

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
    Route::get('background', function () {
        return view('user.background');
    })->name('user.background');
    Route::get('rules', function () {
        return view('user.rules');
    })->name('user.rules');
    // Route::get('job', function () {
    //     return view('user.job');
    // })->name('user.job');
    Route::get('notice', function () {
        return view('user.notice');
    })->name('user.notice');
    Route::get('event', function () {
        return view('user.event');
    })->name('user.event');
    Route::get('/', function () {
        return view('user.home');
    })->name('user.home');
    // Route::get('business', function () {
    //     return view('user.business');
    // })->name('user.business');
    Route::resource('search', 'SearchController');

    Route::get('fetch-family-list/{id}', 'ChartController@fetchfamilylist');
    Route::POST('downloadPDF', 'ChartController@downloadPDF');
    Route::get('history/{id}', 'PeopleHistoryController@getPeople')->name('user.history');
    Route::get('chart/{id}', function () {
        return view('user.chart');
    });
});

// Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/login');
    });

    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::group(['namespace' => 'Admin'], function () {
        Route::resource('relationship', 'PersonController');
        Route::resource('user', 'AdminController');
        Route::resource('theme', 'ThemeController');
        Route::resource('page', 'PageController');
        Route::resource('blog', 'BlogController');
        Route::resource('job', 'JobController');
        Route::resource('people_history', 'PeopleHistoryController');
    });
}); 
// Route::group(['prefix' => 'admin'], function () {
//     Auth::routes();
// });
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');



Route::resource('search', 'User\SearchController');
Route::resource('jobList', 'User\JobListController');
Route::resource('business', 'User\BusinessListController');

Route::get('businessDetail/{id}', 'User\BusinessDetailController@getBusinessDetail')->name('user.businessDetail');
Route::get('jobDetail/{id}', 'User\JobDetailController@getJobDetail')->name('user.jobDetail');


// Route::get('/chart', [App\Http\Controllers\HomeController::class, 'index'])->name('chart');