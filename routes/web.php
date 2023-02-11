<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentification;
use App\Http\Controllers\app\settings\Users;
use App\Http\Middleware\Application;

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
    if(\Session::has('compte')) return redirect('/home');
    else return view('welcome');
});
Route::get('/forgot-password', function () {
    if(\Session::has('compte')) return redirect('/home');
    else return view('forgot-password');
});
Route::post('authentification',[Authentification::class, 'authentification']);
Route::post('forgotPassword',[Authentification::class, 'forgotPassword']);
Route::get('log-out',[Authentification::class, 'log_out']);
Route::get('reset-password/{token}',[Authentification::class, 'resetPasswordView']);
Route::post('resetPassword',[Authentification::class, 'resetPassword']);

Route::prefix('/')->middleware([Application::class])->group(function () {
    Route::get('home', function () {
        return view('app.home');
    });
    Route::prefix('/settings')->group(function () {
        Route::get('/', function () {
            return view('app.settings.index');
        });
        Route::prefix('/users')->group(function () {
            Route::get('/list',[Users::class, 'index_users']);
            Route::get('/add',[Users::class, 'addUser']);
            Route::post('/addUser',[Users::class, 'addUserForm']);
            Route::get('/view/{id}',[Users::class, 'viewUser']);
        });
        Route::prefix('/roles')->group(function () {
            Route::get('/list',[Users::class, 'index_roles']);
            Route::get('/view/{id}',[Users::class, 'viewRole']);
            Route::get('/add',[Users::class, 'addRole']);
            Route::post('/addRole',[Users::class, 'addRoleForm']);
            Route::get('/delete/{id}/{trash?}',[Users::class, 'deleteRole']);
            Route::get('/update/{id}',[Users::class, 'updateRole']);
            Route::post('/updateRole',[Users::class, 'updateRoleForm']);   
            Route::get('/trash',[Users::class, 'trashRoles']);     
            Route::get('/get-back/{id}',[Users::class, 'backRole']);
               
        });
    });
});