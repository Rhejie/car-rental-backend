<?php

namespace App\Services\Admin;

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
        }, 'vehiclePlace.place', 'user']);

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

        if (($this->roleService->getCurrentUserRole())->name == 'user') {

            $bookings = $bookings->where('user_id', auth()->user()->id);
        }

        if(isset($vehicle_id) && $vehicle_id) {

            $bookings = $bookings->where('vehicle_id', $vehicle_id);

        }

        $bookings = $bookings->where('booking_start', '>', Carbon::now())->orderBy('booking_start', 'asc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($bookings, 200);
    }

    public function store($request)
    {

        $model = new Booking();

        $model->booking_start = $request->booking_start;
        $model->booking_end = $request->booking_end;
        $model->vehicle_place_id = $request->vehicle_place_id;
        $model->user_id = isset($request->user_id) ? $request->user_id : auth()->user()->id;
        $model->booking_status = 'pending';
        $model->vehicle_id = $request->vehicle_id;
        $model->save();

        return response()->json($this->getBookingById($model->id));
    }

    public function accept($request) {
        $model = Booking::find($request->id);
        $model->booking_status = 'accept';
        $model->save();
        return response()->json($this->getBookingById($model->id));
    }

    public function deploy($id) {
        $model = Booking::find($id);
        $model->deployed = true;
        $model->save();
        return response()->json($this->getBookingById($model->id));
    }


    public function getBookingById($id)
    {

        $model = Booking::find($id);

        return $model;
    }

    public function getUserLatestBook()
    {

        $model = Booking::with(['vehicle' => function ($query) {
            $query->with(['vehicleBrand', 'tracker', 'vehicleImages']);
        }, 'vehiclePlace.place', 'user'])
        ->where('user_id', auth()->user()->id)->where(function ($query) {
            $query->where('booking_status', 'pending');
            $query->orWhere('booking_status', 'accept');
        })->where('booking_start', '>', Carbon::now())->orderBy('booking_start', 'asc')->first();

        return response()->json($model);
    }
}
