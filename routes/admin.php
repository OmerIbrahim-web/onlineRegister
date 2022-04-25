<?php

use App\Http\Controllers\admin\users\PermissionController;
use App\Http\Controllers\admin\users\RoleController;
use App\Http\Controllers\admin\users\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware([
    'auth'
])->group(function(){
    Route::name('admin.')->prefix('admin')->group(function(){
        Route::resource('roles',RoleController::class);
        Route::resource('users',userController::class);
        Route::resource('permissions',PermissionController::class);
        Route::post('permissions/deleteAll', [PermissionController::class, 'deleteAll'])->name('deleteAll');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/{page}', 'AdminController@index');
