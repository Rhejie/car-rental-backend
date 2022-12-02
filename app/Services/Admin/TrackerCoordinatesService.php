<?php

namespace App\Services\Admin;

use App\Models\TrackerCoordinates;

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
        $model->lon = $request['lon'];
        $model->speed = $request['speed'];
        $model->lat = $request['lat'];
        $model->bearing = $request['bearing'];
        $model->altitude = $request['altitude'];
        $model->accuracy = $request['accuracy'];
        $model->batt = $request['batt'];

        $model->save();
    }
}
