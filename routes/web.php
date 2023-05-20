<?php

use App\Http\Controllers\admin\AccountContoller;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KpFormController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.user.auth.login');
});

Route::prefix('/admin')->group(function() {

    Route::get('/', function () {
        return redirect('/admin/login');
    });

    Route::get('/login', function () {
        return view('pages.admin.auth.login');
    });

    Route::prefix('/forgot-password')->group(function(){

        Route::get('/', function () {
            return redirect('/admin/forgot-password/step-one');
        });

        Route::get('/step-one', [ForgotPasswordController::class, 'ForgotPasswordController@stepOne']);
        Route::get('/step-two', [ForgotPasswordController::class, 'ForgotPasswordController@stepTwo']);
        Route::get('/step-three', [ForgotPasswordController::class, 'ForgotPasswordController@stepThree']);
        Route::get('/complete', [ForgotPasswordController::class, 'ForgotPasswordController@complete']);
    }); 

    Route::prefix('/dashboard')->group(function() {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('/records')->group(function() {
        Route::get('/', [RecordController::class, 'index']);
        Route::get('/{id}', [RecordController::class, 'show']);
    });

    Route::prefix('/kp-forms')->group(function() {
        Route::get('/', [KpFormController::class, 'index']);
        Route::get('/{id}', [KpFormController::class, 'show']);
    });

    Route::prefix('/accounts')->group(function() {
        Route::get('/', [AccountContoller::class, 'index']);
        Route::get('/{id}/edit', [AccountContoller::class, 'edit']);
    });

    
    
});


