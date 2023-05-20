<?php

use App\Http\Controllers\admin\AccountContoller;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KpFormController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\user\AccountController as UserAccountController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\KpFormController as UserKpFormController;
use App\Http\Controllers\user\RecordController as UserRecordController;
use App\Http\Controllers\UserForgotPasswordController;
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

Route::prefix('/')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/register', function () {
            return view('pages.user.auth.register.register');
        });
    
        Route::get('/register-confirmation', function () {
            return view('pages.user.auth.register.register-confirmation');
        });
    
        Route::prefix('/forgot-password')->group(function () {
            Route::get('/', function () {
                return redirect('/forgot-password/step-one');
            });
    
            Route::get('/step-one', [UserForgotPasswordController::class, 'stepOne']);
            Route::get('/step-two', [UserForgotPasswordController::class, 'stepTwo']);
            Route::get('/step-three', [UserForgotPasswordController::class, 'stepThree']);
            Route::get('/complete', [UserForgotPasswordController::class, 'complete']);
        });
    });

    // Route::middleware(['auth'])->group(function () {
    // });
    Route::get('/dashboard', [UserDashboardController::class, 'index']);
    // Route::get('/records', [UserRecordController::class, 'index']);
    Route::resource('records', UserRecordController::class)
        ->only(['index', 'create']);
    Route::get('/kp-forms', [UserKpFormController::class, 'index']);
    Route::get('/accounts', [UserAccountController::class, 'index']);

});


Route::prefix('/admin')->group(function () {

    Route::get('/', function () {
        return redirect('/admin/login');
    });

    Route::get('/login', function () {
        return view('pages.admin.auth.login');
    });

    Route::prefix('/forgot-password')->group(function () {

        Route::get('/', function () {
            return redirect('/admin/forgot-password/step-one');
        });

        Route::get('/step-one', [ForgotPasswordController::class, 'ForgotPasswordController@stepOne']);
        Route::get('/step-two', [ForgotPasswordController::class, 'ForgotPasswordController@stepTwo']);
        Route::get('/step-three', [ForgotPasswordController::class, 'ForgotPasswordController@stepThree']);
        Route::get('/complete', [ForgotPasswordController::class, 'ForgotPasswordController@complete']);
    });

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('/records')->group(function () {
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
