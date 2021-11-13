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

// Auth::routes();
// Route::group(['prefix' => 'admin'], function () {
//     Auth::routes([
//         'register' => false, // Registration Routes...
//         'reset' => false, // Password Reset Routes...
//         'verify' => false, // Email Verification Routes...
//     ]);
// });
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/relationship/index', [App\Http\Controllers\Admin\PersonController::class, 'index'])->name('admin.person.index');
Route::get('/admin/relationship/create', [App\Http\Controllers\Admin\PersonController::class, 'create'])->name('admin.person.create');
Route::post('/admin/relationship/index', [App\Http\Controllers\Admin\PersonController::class, 'store'])->name('admin.person.store');
Route::get('/admin/relationship/{id}/edit', [App\Http\Controllers\Admin\PersonController::class, 'edit'])->name('admin.person.edit');
Route::get('/admin/relationship/{id}/view', [App\Http\Controllers\Admin\PersonController::class, 'show'])->name('admin.person.show');
// Route::post('admin/relationship/index', [
//     'uses'	=> 'App\Http\Controllers\Admin\PersonController@store',
//     'as'	=> 'admin.person.store'
// ]);

Route::get('/admin/user/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/index', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/view/{id}', [App\Http\Controllers\Admin\AdminController::class, 'show'])->name('admin.user.show');
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/index', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.user.update');

Route::delete('/admin/user/remove/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.user.destroy');
