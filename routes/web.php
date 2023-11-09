<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KpFormController;
use App\Http\Controllers\admin\RecordController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RecordsKpFormController;
use App\Http\Controllers\user\AuditTrailController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\KpFormController as UserKpFormController;
use App\Http\Controllers\user\RecordController as UserRecordController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\ReportController as UserReportController;
use App\Mail\OTP;
use App\Mail\TestEmail;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    // Route::middleware('guest')->group(function () {
    //     Route::get('/', function () {
    //         return view('pages.admin.auth.login');
    //     })->name('adminRoot');
    // });

    Route::middleware(['admin', 'account_verified'])->group(function () {

        Route::name('admin.')->group(function () {
            Route::prefix('/dashboard')->group(function () {
                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('/reports', [DashboardController::class, 'getReports'])->name('dashboard.get-reports');
                Route::get('/cases-per-barangay', [DashboardController::class, 'getCasesPerBarangay'])->name('dashboard.get-cases-per-barangay');
            });

            Route::prefix('records')->name('records.')->group(function () {
                Route::get('print/{record}', [RecordController::class, 'print'])->name('print');
            });
            Route::resource('records', RecordController::class)
                ->only(['index', 'create', 'store', 'show', 'edit', 'update']);

            Route::resource('kp-forms', KpFormController::class)->only(['index', 'show']);

            Route::resource('accounts', AccountController::class);
            // ->only(['index', 'show', 'edit', 'update', 'destroy']);

            Route::prefix('/accounts')->name('accounts.')->group(function () {
                Route::post('/verify', [AccountController::class, 'verify'])->name('verify');
            });
        });
    });
});

Route::prefix('/')->group(function () {

    Route::middleware(['guest'])->group(function () {

        Route::get('/', function () {
            if (Auth::viaRemember()) {
                if (auth()->user()->roles[0]->id === 1) {
                    return redirect()->intended("/admin/dashboard");
                } else {
                    return redirect()->intended("/dashboard");
                }
            }

            return view('pages.landing_page.index');
        })->name('userRoot');

        Route::get('/login', function() {
            $users = User::getNonDeletedUsers()->get();
            $adminUsers = User::getAdminUsers()->get();

            return view('pages.user.auth.login', ["users" => $users, "adminUsers" => $adminUsers]);
        })->name('login');

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
        Route::resource('dashboard', UserDashboardController::class)
            ->only(['index']);

        Route::post('/dashboard', [UserDashboardController::class, 'getHearingDates'])->name('dashboard.get-hearing-dates');

        Route::get('/dashboard/reports', [UserDashboardController::class, 'getReports'])->name('dashboard.get-reports');
        Route::get('/dashboard/reports-purok', [UserDashboardController::class, 'getReportsPerPurok'])->name('dashboard.get-hearing-dates-per-purok');

        Route::prefix('records')->name('records.')->group(function () {
            Route::get('print/{record}', [UserRecordController::class, 'print'])->name('print');

            Route::prefix('kp-forms')->name('kp-forms.')->group(function () {
                Route::get('/step-one/{id}', [RecordsKpFormController::class, 'stepOne'])->name('get.step-one');
                Route::post('/step-one', [RecordsKpFormController::class, 'postStepOne'])->name('post.step-one');

                Route::get('/step-two', [RecordsKpFormController::class, 'stepTwo'])->name('get.step-two');
                Route::post('/step-two', [RecordsKpFormController::class, 'postStepTwo'])->name('post.step-two');

                Route::get('/step-three', [RecordsKpFormController::class, 'stepThree'])->name('success');

                Route::get('/edit/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'edit'])->name('edit');
                Route::put('/update/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'update'])->name('update');

                Route::delete('/delete/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'destroy'])->name('destroy');

                Route::get('/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'show'])->name('show');

                Route::get('/{record}', [RecordsKpFormController::class, 'index'])->name('index');
                Route::post('/{recordId}', [RecordsKpFormController::class, 'store'])->name('store');

                Route::get('/file/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'streamFile'])->name('file.show');
                Route::delete('/file/delete/{recordId}/{issuedKpFormId}', [RecordsKpFormController::class, 'deleteFile'])->name('file.destroy');
            });
        });
        Route::resource('records', UserRecordController::class);

        Route::prefix('kp-forms')->name('kp-forms.')->group(function () {
            Route::get('/', [UserKpFormController::class, 'index']);
            Route::get('/{id}', [UserKpFormController::class, 'show'])->name('show');
        });

        Route::get('/audit-trail', [AuditTrailController::class, 'index']);

        Route::resource('reports', UserReportController::class)
            ->only(['index', 'store']);
    });
});
