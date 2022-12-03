<?php

namespace App\Services\Admin;

use App\Models\Booking;
use App\Models\Tracker;
use App\Models\TrackerCoordinates;
use App\Models\Vehicle;

class TrackerCoordinatesService {

    public function store($request) {

        $getTracker = (new TrackerService())->getTrackerByName($request['id']);

        if(!$getTracker) {
            return;
        }

        $getVehicle = (new VehicleService())->getVehicleByTrackerId($getTracker->id);

        if(!$getVehicle) {
            return;
        }

        $getBooking = (new BookingService())->getDeployedBookingByVehicleId($getVehicle->id);

        if (!$getBooking) {
            return;
        }

        $model = new TrackerCoordinates();
        $model->tracker_id = $getTracker->id;
        $model->booking_id = $getBooking->id;
        $model->lon = isset($request['lon']) && $request['lon'] ? $request['lon'] : null;
        $model->speed = isset($request['speed']) && $request['speed'] ? $request['speed'] : null ;
        $model->lat = isset($request['lat']) && $request['lat'] ? $request['lat'] : null ;
        $model->bearing = isset($request['bearing']) && $request['bearing'] ? $request['bearing'] : null ;
        $model->altitude = isset($request['altitude']) && $request['altitude'] ? $request['altitude'] : null;
        $model->accuracy = isset($request['accuracy']) && $request['accuracy'] ? $request['accuracy'] : null;
        $model->batt = isset($request['batt']) && $request['batt'] ? $request['batt'] : null ;

        $model->save();
    }

    public function getDeployedTracker() {

        $bookingsVehicleID = Booking::select(['vehicle_id'])->where('deployed', true)->get();

        $vehiclesTrackerId = Vehicle::select(['tracker_id'])->whereIn('id', $bookingsVehicleID)->get();

        $trackers = Tracker::with(['trackerCoordinates', 'vehicle'])->whereIn('id', $vehiclesTrackerId)->get();

        return response()->json($trackers);
    }
}
