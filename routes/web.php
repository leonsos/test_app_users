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
Route::get('/simpleuser', function () {
    return view('simpleuser');
});
Auth::routes();
Route::middleware(['auth','isAdmin'])->group(function () {    
    Route::get('log', [\App\Http\Controllers\UserController::class, 'logsys'])->name('log.index');
    Route::get('logmails', [\App\Http\Controllers\UserController::class, 'logsysmails'])->name('logmails.index');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/add', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::post('users/send', [\App\Http\Controllers\UserController::class, 'SendData'])->name('users.senddata');
    Route::get('users/data', [\App\Http\Controllers\UserController::class, 'getDataUserMail'])->name('users.userdata');
    Route::post('users/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::get('users/delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
    Route::get('dataTableUser', [\App\Http\Controllers\UserController::class, 'datatables'])->name('dataTableUser');    
    Route::get('dataTableMails', [\App\Http\Controllers\UserController::class, 'datatablesMails'])->name('dataTableMails');    
    Route::post('getState', [\App\Http\Controllers\UserController::class, 'getstate'])->name('getstate');    
    Route::post('getCitytate', [\App\Http\Controllers\UserController::class, 'getcity'])->name('getcity');    
    Route::get('userslogs', [\App\Http\Controllers\UserController::class, 'userslogstables'])->name('userslogs');    
    Route::get('mailslogs', [\App\Http\Controllers\UserController::class, 'mailslogstables'])->name('mailslogs');    
    Route::get('logs/delete/{product}', [\App\Http\Controllers\UserController::class, 'deleteLogs'])->name('logs.delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isAdmin');
