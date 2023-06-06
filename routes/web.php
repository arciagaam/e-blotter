<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KpFormController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\user\LoginTrailController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\KpFormController as UserKpFormController;
use App\Http\Controllers\user\RecordController as UserRecordController;
use App\Http\Controllers\user\UserController;
use App\Models\LoginRole;
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

Route::prefix('/admin')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/', function () {
            return view('pages.admin.auth.login');
        })->name('adminRoot');
    });

    Route::middleware(['admin', 'account_verified'])->group(function () {

        Route::name('admin.')->group(function() {
            Route::prefix('/dashboard')->group(function () {
                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            });
    
            Route::resource('records', RecordController::class)
            ->only(['index', 'create', 'store', 'show', 'edit', 'update']);
    
            Route::prefix('/kp-forms')->group(function () {
                Route::get('/', [KpFormController::class, 'index']);
                Route::get('/{id}', [KpFormController::class, 'show']);
            });

            Route::resource('accounts', AccountController::class)
            ->only(['index', 'show', 'edit', 'update']);
    
            Route::prefix('/accounts')->name('accounts.')->group(function () {
                Route::post('/verify', [AccountController::class, 'verify'])->name('verify');
            });
        });


    });
});

Route::prefix('/')->group(function () {

    Route::middleware(['guest'])->group(function () {

        Route::get('/', function () {
            $loginRoles = LoginRole::all();
            return view('pages.user.auth.login', ['loginRoles' => $loginRoles]);
        })->name('userRoot');

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
            Route::post('/step-three', [ForgotPasswordController::class, 'postStepThree']);

            Route::get('/complete', [ForgotPasswordController::class, 'complete']);
        });
    });

    Route::middleware(['user', 'account_verified'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
        // Route::get('/records', [UserRecordController::class, 'index']);
        Route::resource('records', UserRecordController::class)
            ->only(['index', 'create', 'store', 'show', 'edit', 'update']);
        Route::get('/kp-forms', [UserKpFormController::class, 'index']);
        Route::get('/accounts', [LoginTrailController::class, 'index']);
    });
});