<?php

namespace App\Http\Controllers;

use App\Jobs\SendingEmailVerificationJob;
use App\Jobs\StoringTrackerCoordinatesJob;
use App\Models\TrackerCoordinates;
use Illuminate\Http\Request;

class TrackerCoordinatesController extends Controller
{
    public function sendCoordinate(Request $request) {

        StoringTrackerCoordinatesJob::dispatch($request->all());

    }
}
