<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/user/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('role')
        ->group(function () {
            Route::get('/roles', [App\Http\Controllers\RoleController::class, 'list']);
            Route::post('/role', [App\Http\Controllers\RoleController::class, 'store']);
        });

    Route::prefix('identification')
        ->group(function () {
            Route::get('/identifications', [App\Http\Controllers\IdentificationController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\IdentificationController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\IdentificationController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\IdentificationController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\IdentificationController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\IdentificationController::class, 'restore']);
        });

    Route::prefix('payment-method')
        ->group(function () {
            Route::get('/payment-methods', [App\Http\Controllers\PaymentModeController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\PaymentModeController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\PaymentModeController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\PaymentModeController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\PaymentModeController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\PaymentModeController::class, 'restore']);
        });

    Route::prefix('company')
        ->group(function () {
            Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\CompanyController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\CompanyController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\CompanyController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\CompanyController::class, 'restore']);
            Route::get('/select-company', [App\Http\Controllers\CompanyController::class, 'selectCompany']);
        });

    Route::prefix('overcharge')->group(function () {

        Route::prefix('type')->group(function () {
            Route::get('/list', [App\Http\Controllers\OverchargeTypeController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\OverchargeTypeController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'restore']);
        });


    });

    Route::prefix('tracker')->group(function () {
        Route::get('trackers', [App\Http\Controllers\TrackerController::class, 'list']);
        Route::post('/store', [App\Http\Controllers\TrackerController::class, 'store']);
        Route::post('/tracker/{id}', [App\Http\Controllers\TrackerController::class, 'tracker']);
        Route::post('/update/{id}', [App\Http\Controllers\TrackerController::class, 'update']);
        Route::post('/trash/{id}', [App\Http\Controllers\TrackerController::class, 'trash']);
        Route::post('/force-delete/{id}', [App\Http\Controllers\TrackerController::class, 'forceDelete']);
        Route::post('/restore/{id}', [App\Http\Controllers\TrackerController::class, 'restore']);
    });
});
