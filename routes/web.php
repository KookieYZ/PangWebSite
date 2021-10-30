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

Route::get('search', function () {
    return view('search');
});

// Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/relationship/index', [App\Http\Controllers\Admin\PersonController::class, 'index'])->name('admin.person.index');
Route::get('/admin/relationship/create', [App\Http\Controllers\Admin\PersonController::class, 'create'])->name('admin.person.create');
Route::post('/admin/relationship/index', [App\Http\Controllers\Admin\PersonController::class, 'store'])->name('admin.person.store');
