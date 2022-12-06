<?php

namespace App\Services\Admin;

use App\Events\SendUserNotification;
use App\Jobs\NotificationJob;
use App\Jobs\PaymentJob;
use App\Jobs\SavePaymentTransactionJob;
use App\Jobs\TransactionLogJob;
use App\Models\Booking;
use Carbon\Carbon;

class BookingService
{

    private $roleService;
    public function __construct()
    {
        $this->roleService = new RoleServices();
    }
    public function list($params, $vehicle_id = null)
    {

        $bookings = Booking::with(['vehicle' => function ($query) use ($params) {
            $query->with(['vehicleBrand', 'tracker', 'vehicleImages']);
        },  'user']);

        if ($params->search) {

            $bookings = $bookings->where(function ($query) use ($params) {
                // $query->orWhere('name', 'LIKE', "%$params->search%");
                $query->whereHas('vehicle', function ($query) use ($params) {
                    $query->where('model', 'LIKE', "%$params->search%");
                    $query->orWhereHas('vehicleBrand', function ($query) use ($params) {
                        $query->where('name', 'LIKE', "%$params->search%");
                    });
                });
            });
        }

        $role = $this->roleService->getCurrentUserRole();

        if ($role->name == 'user') {

            $bookings = $bookings->where('user_id', auth()->user()->id);
        }


        if($role->name == 'admin' && !$vehicle_id) {

            $bookings = $bookings->where('deployed', false);

        }


        if(isset($vehicle_id) && $vehicle_id) {

            $bookings = $bookings->where('vehicle_id', $vehicle_id);

        }

        $bookings = $bookings
            ->orderBy('booking_start', 'asc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($bookings, 200);
    }

    public function deployedList($params, $vehicle_id = null)
    {

        $bookings = Booking::with(['driver','vehicle' => function ($query) use ($params) {
            $query->with(['vehicleBrand', 'tracker', 'vehicleImages']);
        }, 'user', 'payments.paymentMode']);

        if ($params->search) {

            $bookings = $bookings->where(function ($query) use ($params) {
                // $query->orWhere('name', 'LIKE', "%$params->search%");
                $query->whereHas('vehicle', function ($query) use ($params) {
                    $query->where('model', 'LIKE', "%$params->search%");
                    $query->orWhereHas('vehicleBrand', function ($query) use ($params) {
                        $query->where('name', 'LIKE', "%$params->search%");
                    });
                });
            });
        }

        $bookings = $bookings->where('deployed', true)->where('returned', false);

        $bookings = $bookings
            ->where('deployed', '!=', false)
            ->orderBy('booking_start', 'asc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($bookings, 200);
    }

    public function store($request)
    {

        $user = auth()->user();

        $model = new Booking();

        $model->booking_start = $request->booking_start;
        $model->booking_end = $request->booking_end;
        $model->user_id = isset($request->user_id) ? $request->user_id : auth()->user()->id;
        $model->booking_status = 'pending';
        $model->vehicle_id = $request->vehicle_id;
        $model->add_driver = $request->add_driver;
        $model->destination = $request->destination;
        $model->booking_purpose = $request->booking_purpose;
        $model->primary_operator_name = $request->primary_operator_name;
        $model->primary_operator_license_no = $request->primary_operator_license_no;
        $model->secondary_operator_name = $request->secondary_operator_name;
        $model->secondary_operator_license_no = $request->secondary_operator_license_no;
        $model->save();


        broadcast(new SendUserNotification('', 'Booking', 'Successfully booked the current status is pending, please wait', $user))->toOthers();

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' is successfully booked!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'success'
        ];

        NotificationJob::dispatch($paramsNotification);

        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'pending'
        ];

        TransactionLogJob::dispatch($params);

        return response()->json($this->getBookingById($model->id));
    }

    public function accept($request) {
        $model = Booking::find($request->id);
        $model->booking_status = 'accept';
        $model->save();

        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'accept'
        ];

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' is successfully accepted!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'success'
        ];

        NotificationJob::dispatch($paramsNotification);

        TransactionLogJob::dispatch($params);
        return response()->json($this->getBookingById($model->id));
    }

    public function decline($request) {
        $model = Booking::find($request->id);
        $model->booking_status = 'decline';
        $model->save();

        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'decline'
        ];

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' is declined!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'fail'
        ];

        NotificationJob::dispatch($paramsNotification);

        TransactionLogJob::dispatch($params);
        return response()->json($this->getBookingById($model->id));
    }

    public function cancel($request) {

        $model = Booking::find($request->id);
        $model->booking_status = 'cancel';
        $model->save();

        if($model->driver_id) {
            (new DriverServices)->updateDriverStatus($model->driver_id, true);
        }

        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'cancel'
        ];

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' is cancelled!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'warning'
        ];

        NotificationJob::dispatch($paramsNotification);

        TransactionLogJob::dispatch($params);
        return response()->json($this->getBookingById($model->id));
    }

    public function deploy($id, $request) {

        $model = Booking::find($id);
        $model->deployed = true;
        $model->driver_id = isset($request->driver) && $request->driver ? $request->driver['id'] : null;
        $model->add_driver = $request->add_driver;
        $model->save();

        if($model->driver_id) {
            (new DriverServices)->updateDriverStatus($model->driver_id, false);
        }


        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'deploy'
        ];

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' successfully deployed drive safely!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'success'
        ];

        NotificationJob::dispatch($paramsNotification);

        TransactionLogJob::dispatch($params);

        (new PaymentService)->store($request, $model->id);

        return response()->json($this->getBookingById($model->id));
    }

    public function returned($id, $request) {

        $model = Booking::find($id);
        $model->returned = true;
        $model->save();

        if($model->driver_id) {
            (new DriverServices)->updateDriverStatus($model->driver_id, true);
        }
        $params = [
            'transactionable_type' => 'App\Models\Booking',
            'transactionable_id' => $model->id,
            'type' => 'booking',
            'process' => 'returned'
        ];

        $paramsNotification = [
            'user_id' => $model->user_id,
            'message' => 'Your destination to '.$model->destination.' on '. (Carbon::parse($model->booking_start))->format('M d, Y').' is succussfully returned!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'success'
        ];

        NotificationJob::dispatch($paramsNotification);

        TransactionLogJob::dispatch($params);

        if(!$request->is_fully_paid || collect($request->overcharges)->count() > 0) {
            (new PaymentService)->store($request, $model->id);
        }

        foreach($request->overcharges as $overcharge) {

            $params = [
                'booking_id' => $model->id,
                'charge' => $overcharge['charge'],
                'overcharge_type_id' => $overcharge['overcharge_type_id']
            ];

            (new OverchargeService)->store(json_decode(json_encode($params)));
        }

        return response()->json($this->getBookingById($model->id));
    }


    public function getBookingById($id)
    {

        $model = Booking::find($id);

        return $model;
    }

    public function getUserLatestBook()
    {

        $model = Booking::with(['driver','vehicle' => function ($query) {
            $query->with(['vehicleBrand', 'tracker', 'vehicleImages']);
        }, 'user'])
        ->where('user_id', auth()->user()->id)->where(function ($query) {
            $query->where('booking_status', 'pending');
            $query->orWhere('booking_status', 'accept');
        })->where('booking_start', '>', Carbon::now())->orderBy('booking_start', 'asc')->first();

        return response()->json($model);
    }

    public function getDeployedBookingByVehicleId($id) {
        $model = Booking::select(['id', 'vehicle_id', 'deployed'])->where('vehicle_id', $id)->where('deployed', true)->first();
        return $model;
    }
}
