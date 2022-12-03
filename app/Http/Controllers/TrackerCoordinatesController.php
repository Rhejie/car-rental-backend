<?php

namespace App\Http\Controllers;

use App\Jobs\SendingEmailVerificationJob;
use App\Jobs\StoringTrackerCoordinatesJob;
use App\Models\TrackerCoordinates;
use App\Services\Admin\TrackerCoordinatesService;
use Illuminate\Http\Request;

class TrackerCoordinatesController extends Controller
{
    private $trackerCoordinatesService;

    public function __construct() {
        $this->trackerCoordinatesService = new TrackerCoordinatesService();
    }

    public function sendCoordinate(Request $request) {

        StoringTrackerCoordinatesJob::dispatch($request->all());

    }

    public function getDeployedTrackers() {
        return $this->trackerCoordinatesService->getDeployedTracker();
    }
}
