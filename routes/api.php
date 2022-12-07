<?php

use App\Events\SendUserNotification;
use App\Jobs\SendingEmailVerificationJob;
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

Route::middleware('auth:sanctum')->post('/try', function () {
    $user = auth()->user();

    broadcast(new SendUserNotification('', 'Booking', 'Successfully booked the current status is pending, please wait', $user))->toOthers();

    return true;
});

Route::post('/send', [App\Http\Controllers\TrackerCoordinatesController::class, 'sendCoordinate']);

Route::get('/invoice/{id}', [App\Http\Controllers\InvoicesController::class, 'download']);

Route::post('/user/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/user/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/remove/profile_url', [App\Http\Controllers\UsersController::class, 'removeImageInStorageInRegister']);

Route::post('/user/profile/upload', [App\Http\Controllers\UsersController::class, 'uploadProfile']);
Route::get('/download/{id}', [App\Http\Controllers\BookingController::class, 'download']);

Route::get('/transaction-form', [App\Http\Controllers\InvoicesController::class, 'transactionForm']);
Route::get('/user/profile/restore', function (Request $request) {
    return $request->get('url');
});

Route::middleware('auth:sanctum')->group(function () {
    // vehicle apis
    Route::get('/user/data', function (Request $request) {
        return 100;
    });

    Route::prefix('notification')->group(function () {
        Route::get('/user', [App\Http\Controllers\NotificationsController::class, 'getMyNotifications']);
        Route::post('/view/{id}', [App\Http\Controllers\NotificationsController::class, 'viewNotif']);
    });

    Route::prefix('reports')->group(function () {
        Route::get('/daily', [App\Http\Controllers\ReportController::class, 'daily']);
    });

    Route::prefix('admin')
        ->group(function () {
            Route::get('users-count', [App\Http\Controllers\DashboardController::class, 'countUsers']);
            Route::get('/count-verified-account', [App\Http\Controllers\DashboardController::class, 'countVerifiedAccount']);
            Route::get('/count-unverified-account', [App\Http\Controllers\DashboardController::class, 'countUnVerifiedAccount']);
            Route::get('/count-total-bookings', [App\Http\Controllers\DashboardController::class, 'countTotalBookings']);
            Route::get('/count-pending-bookings', [App\Http\Controllers\DashboardController::class, 'countPendingBookings']);
            Route::get('/count-accept-bookings', [App\Http\Controllers\DashboardController::class, 'countAcceptBookings']);
            Route::get('/count-cancel-bookings', [App\Http\Controllers\DashboardController::class, 'countCancelBookings']);
            Route::get('/count-decline-bookings', [App\Http\Controllers\DashboardController::class, 'countDeclineBookings']);
            Route::get('/count-deployed-bookings', [App\Http\Controllers\DashboardController::class, 'countDeployedBookings']);
            Route::get('/count-returned-bookings', [App\Http\Controllers\DashboardController::class, 'countReturnedBookings']);
            Route::get('/count-vehicles', [App\Http\Controllers\DashboardController::class, 'countVehicles']);
        });

    Route::get('/user-profile/{id}', [App\Http\Controllers\AuthController::class, 'getUserProfile']);

    Route::post('user/logout', [App\Http\Controllers\AuthController::class, 'logout']);


    Route::prefix('user')->group(function () {
        Route::get('/list', [App\Http\Controllers\UsersController::class, 'list']);
        Route::post('/verified/{id}', [App\Http\Controllers\AuthController::class, 'verifiedUser']);

    });

    Route::prefix('payment')->group(function () {
        Route::get('/history/{booking_id}', [App\Http\Controllers\PaymentController::class, 'history']);
    });

    Route::prefix('trackers')->group(function () {
        Route::get('/deployed-trackers', [App\Http\Controllers\TrackerCoordinatesController::class, 'getDeployedTrackers']);
    });

    Route::prefix('vehicle')->group(function () {
        Route::get('/list', [App\Http\Controllers\VehicleController::class, 'list']);
        Route::post('/create', [App\Http\Controllers\VehicleController::class, 'create']);
        Route::get('/show/{id}', [App\Http\Controllers\VehicleController::class, 'show']);
        Route::post('/image/upload', [App\Http\Controllers\VehicleController::class, 'upload']);
        Route::post('/image/undo', [App\Http\Controllers\VehicleController::class, 'undo']);
        Route::post('/update/{id}', [App\Http\Controllers\VehicleController::class, 'update']);
        Route::get('/select-vehicle', [App\Http\Controllers\VehicleController::class, 'selectVehicle']);
    });

    Route::prefix('/booking')->group(function () {
        Route::get('/list', [App\Http\Controllers\BookingController::class, 'list']);
        Route::get('/history/{vehicle_id}', [App\Http\Controllers\BookingController::class, 'history']);
        Route::post('/store', [App\Http\Controllers\BookingController::class, 'store'])->name('user-store-booking');
        Route::post('/accept', [App\Http\Controllers\BookingController::class, 'accept']);
        Route::post('/decline', [App\Http\Controllers\BookingController::class, 'decline']);
        Route::post('/cancel', [App\Http\Controllers\BookingController::class, 'cancel']);
        Route::post('/deploy/{id}', [App\Http\Controllers\BookingController::class, 'deploy']);
        Route::post('/returned/{id}', [App\Http\Controllers\BookingController::class, 'returned']);
        Route::get('/get-current-book', [App\Http\Controllers\BookingController::class, 'getCurrentBookUser']);
        Route::get('/deployed-list', [App\Http\Controllers\BookingController::class, 'deployedList']);
        Route::get('/download/{id}', [App\Http\Controllers\BookingController::class, 'download']);
        Route::get('/transaction-form/{id}', [App\Http\Controllers\BookingController::class, 'transactionForm']);
        Route::get('/agreement/{id}', [App\Http\Controllers\BookingController::class, 'agreementForm']);
    });

    Route::prefix('vehicle-place')->group(function () {
        Route::get('/list/{vehicle_id}', [App\Http\Controllers\VehiclePlacesController::class, 'list']);
        Route::post('/create', [App\Http\Controllers\VehiclePlacesController::class, 'store']);
        Route::get('/show/{id}', [App\Http\Controllers\VehiclePlacesController::class, 'show']);
        Route::post('/update/{id}', [App\Http\Controllers\VehiclePlacesController::class, 'update']);
        Route::get('/select-vehicle-place', [App\Http\Controllers\VehiclePlacesController::class, 'selectVehiclePlaces']);
    });

    Route::prefix('maintenance')->group(function () {
        Route::get('/all', [App\Http\Controllers\VehicleMaintenanceController::class, 'all']);
        Route::get('/list/{vehicle_id}', [App\Http\Controllers\VehicleMaintenanceController::class, 'list']);
        Route::post('/store', [App\Http\Controllers\VehicleMaintenanceController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\VehicleMaintenanceController::class, 'update']);
        Route::post('/trash/{id}', [App\Http\Controllers\VehicleMaintenanceController::class, 'trash']);
        Route::post('/restore/{id}', [App\Http\Controllers\VehicleMaintenanceController::class, 'restore']);
        Route::post('/force-delete/{id}', [App\Http\Controllers\VehicleMaintenanceController::class, 'forceDelete']);
    });

    // Settings apis
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
            Route::get('/select-payment-method', [App\Http\Controllers\PaymentModeController::class, 'selectPaymentMethod']);
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

    Route::prefix('driver')->group(function () {
        Route::get('/drivers', [App\Http\Controllers\DriverController::class, 'list']);
        Route::post('/store', [App\Http\Controllers\DriverController::class, 'store']);
        Route::post('/update/{id}', [App\Http\Controllers\DriverController::class, 'update']);
        Route::post('/trash/{id}', [App\Http\Controllers\DriverController::class, 'trash']);
        Route::post('/force-delete/{id}', [App\Http\Controllers\DriverController::class, 'forceDelete']);
        Route::post('/restore/{id}', [App\Http\Controllers\DriverController::class, 'restore']);
        Route::get('/select-driver', [App\Http\Controllers\DriverController::class, 'selectDriver']);
    });

    Route::prefix('overcharge')->group(function () {

        Route::prefix('type')->group(function () {
            Route::get('/list', [App\Http\Controllers\OverchargeTypeController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\OverchargeTypeController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\OverchargeTypeController::class, 'restore']);
            Route::get('/select', [App\Http\Controllers\OverchargeTypeController::class, 'selectOvercharge']);
        });


    });

    Route::prefix('form')
        ->group(function () {
            Route::get('/forms', [App\Http\Controllers\FormController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\FormController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\FormController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\FormController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\FormController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\FormController::class, 'restore']);
            Route::get('/select-form', [App\Http\Controllers\FormController::class, 'selectForm']);
        });

    Route::prefix('color')
        ->group(function () {
            Route::get('/colors', [App\Http\Controllers\ColorController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\ColorController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\ColorController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\ColorController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\ColorController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\ColorController::class, 'restore']);
            Route::get('/select-color', [App\Http\Controllers\ColorController::class, 'selectColor']);
        });

    Route::prefix('place')
        ->group(function () {
            Route::get('/places', [App\Http\Controllers\PlacesController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\PlacesController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\PlacesController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\PlacesController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\PlacesController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\PlacesController::class, 'restore']);
            Route::get('/select-place', [App\Http\Controllers\PlacesController::class, 'selectPlaces']);
        });

    Route::prefix('vehicle-brand')
        ->group(function () {
            Route::get('/brands', [App\Http\Controllers\VehicleBrandController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\VehicleBrandController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\VehicleBrandController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\VehicleBrandController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\VehicleBrandController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\VehicleBrandController::class, 'restore']);
            Route::get('/select-vehicle-brand', [App\Http\Controllers\VehicleBrandController::class, 'selectVehicleBrand']);
        });

    Route::prefix('fuel-type')
        ->group(function () {
            Route::get('/fuel-types', [App\Http\Controllers\FuelTypeController::class, 'list']);
            Route::post('/store', [App\Http\Controllers\FuelTypeController::class, 'store']);
            Route::post('/update/{id}', [App\Http\Controllers\FuelTypeController::class, 'update']);
            Route::post('/trash/{id}', [App\Http\Controllers\FuelTypeController::class, 'trash']);
            Route::post('/force-delete/{id}', [App\Http\Controllers\FuelTypeController::class, 'forceDelete']);
            Route::post('/restore/{id}', [App\Http\Controllers\FuelTypeController::class, 'restore']);
            Route::get('/select-fuel-type', [App\Http\Controllers\FuelTypeController::class, 'selectFuelType']);
        });

    Route::prefix('tracker')->group(function () {
        Route::get('trackers', [App\Http\Controllers\TrackerController::class, 'list']);
        Route::post('/store', [App\Http\Controllers\TrackerController::class, 'store']);
        Route::post('/tracker/{id}', [App\Http\Controllers\TrackerController::class, 'tracker']);
        Route::post('/update/{id}', [App\Http\Controllers\TrackerController::class, 'update']);
        Route::post('/trash/{id}', [App\Http\Controllers\TrackerController::class, 'trash']);
        Route::post('/force-delete/{id}', [App\Http\Controllers\TrackerController::class, 'forceDelete']);
        Route::post('/restore/{id}', [App\Http\Controllers\TrackerController::class, 'restore']);
        Route::get('/select-tracker', [App\Http\Controllers\TrackerController::class, 'selectTrackers']);
    });

});
