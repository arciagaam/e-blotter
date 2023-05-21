<?php

use App\Http\Controllers\admin\AccountContoller;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KpFormController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\user\AccountController as UserAccountController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\KpFormController as UserKpFormController;
use App\Http\Controllers\user\RecordController as UserRecordController;
use App\Http\Controllers\user\UserController;
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

Route::get('/logout', [Authentication::class, 'logout'])->name('logout');

Route::prefix('/')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/', function () {
            return view('pages.user.auth.login');
        });

        Route::get('/register', [UserController::class, 'index']);
        Route::post('/register', [UserController::class, 'store']);
        Route::get('/registration-success', [UserController::class, 'success']);

        Route::post('/authenticate', [Authentication::class, 'authenticate'])->name('guest.authenticate');

        Route::prefix('/forgot-password')->group(function () {
            Route::get('/', function () {
                return redirect('/forgot-password/step-one');
            });

            Route::get('/step-one', [ForgotPasswordController::class, 'stepOne']);
            Route::post('/step-one', [ForgotPasswordController::class, 'postStepOne']);

            Route::get('/step-two', [ForgotPasswordController::class, 'stepTwo']);
            Route::post('/step-two', [ForgotPasswordController::class, 'postStepTwo']);
            
            Route::get('/step-three', [ForgotPasswordController::class, 'stepThree']);
            Route::get('/complete', [ForgotPasswordController::class, 'complete']);
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

    Route::middleware('guest')->group(function() {
        Route::get('/', function () {
            return redirect('/admin/login');
        });

        Route::get('/login', function () {
            return view('pages.admin.auth.login');
        });
    });

    Route::middleware(['auth', 'admin'])->group(function() {
        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index']);
        });
    
        Route::prefix('/records')->group(function () {
            Route::get('/', [RecordController::class, 'index']);
            Route::get('/{id}', [RecordController::class, 'show']);
        });
    
        Route::prefix('/kp-forms')->group(function () {
            Route::get('/', [KpFormController::class, 'index']);
            Route::get('/{id}', [KpFormController::class, 'show']);
        });
    
        Route::prefix('/accounts')->group(function () {
            Route::get('/', [AccountContoller::class, 'index']);
            Route::get('/{id}/edit', [AccountContoller::class, 'edit']);
        });
    });



});
