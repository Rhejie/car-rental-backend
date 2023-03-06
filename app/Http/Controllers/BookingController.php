<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\DeployRequest;
use App\Http\Requests\Booking\ReturnedRequest;
use App\Http\Requests\Booking\StoreRequest;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Services\Admin\BookingService;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    private $bookingService;

    public function __construct(BookingService $bookingService) {
        $this->bookingService = $bookingService;
    }

    public function list(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;
        $status_filter = $request->status_filter ? $request->status_filter : 'ALL';

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count,
            'status_filter' => $status_filter
        ];

        return $this->bookingService->list(json_decode(json_encode($params)));
    }

    public function allBookings(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->allBooking(json_decode(json_encode($params)));
    }

    public function allBooked() {
        return $this->bookingService->allBooked();
    }

    public function deployedList(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->deployedList(json_decode(json_encode($params)));
    }

    public function history(Request $request, $vehicle_id) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->list(json_decode(json_encode($params)), $vehicle_id);
    }

    public function store(StoreRequest $request) {

        return $this->bookingService->store($request);
    }

    public function update(StoreRequest $request, $id) {
        return $this->bookingService->update($request, $id);
    }

    public function accept(Request $request) {

        return $this->bookingService->accept(json_decode(json_encode($request->all())));

    }

    public function decline(Request $request) {
        return $this->bookingService->decline(json_decode(json_encode($request->all())));
    }

    public function cancel(Request $request) {

        return $this->bookingService->cancel(json_decode(json_encode($request->all())));
    }

    public function deploy($id, DeployRequest $request) {
        return $this->bookingService->deploy($id, $request);
    }

    public function overdue(Request $request) {
        return $this->bookingService->overdue($request->all());
    }

    public function exceeding(Request $request) {
        return $this->bookingService->exceeding($request->all());
    }

    public function returned($id, ReturnedRequest $request) {

        return $this->bookingService->returned($id, $request);
    }

    public function getCurrentBookUser() {

        return $this->bookingService->getUserLatestBook();

    }

    public function download($id) {

        $book = Booking::with(['user', 'payments', 'vehicle', 'driver', 'payments.paymentMode', 'overcharges.overchargeType'])->find($id);

        $fileName = 'Invoice-'.$book->user->first_name.'-'.$book->user->last_name. time() . '.pdf';
        $pdf = new PDF;
        $pdf = PDF::loadView('invoice.user-booking-invoice', ["item" => $book]);

        $store = Storage::disk('local')->put('downloads/'.$fileName, $pdf->output());

        $path = 'downloads/'.$fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);
    }

    public function transactionForm($id) {

        $book = Booking::with(['user', 'payments', 'vehicle.vehicleBrand', 'driver', 'payments.paymentMode'])->find($id);

        $fileName = 'Invoice-'.$book->user->first_name.'-'.$book->user->last_name. time() . '.pdf';
        $pdf = new PDF;
        $pdf = PDF::loadView('agreement.transaction', ["item" => $book]);

        $store = Storage::disk('local')->put('downloads/'.$fileName, $pdf->output());

        $path = 'downloads/'.$fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);
    }

    public function agreementForm($id) {

        $book = Booking::with(['user', 'payments', 'vehicle.vehicleBrand', 'driver', 'payments.paymentMode'])->find($id);

        $fileName = 'Agreement-form-'.$book->user->first_name.'-'.$book->user->last_name. time() . '.pdf';
        $pdf = new PDF;
        $pdf = PDF::loadView('agreement.agreement', ["item" => $book]);

        $store = Storage::disk('local')->put('downloads/'.$fileName, $pdf->output());

        $path = 'downloads/'.$fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);
    }

    public function downloadBookingHistory($id) {
        $book = Vehicle::with(['bookings', 'vehicleBrand'])->find($id);

        $fileName = 'Vehicle-booking-history-'.$book->model.'-'.$book->make. time() . '.pdf';
        $pdf = new PDF;
        $pdf = PDF::loadView('vehicle.history', ["item" => $book]);

        $store = Storage::disk('local')->put('downloads/'.$fileName, $pdf->output());

        $path = 'downloads/'.$fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);

    }

    public function downloadMaintenanceHistory($id) {

        $book = Vehicle::with(['maintenance', 'vehicleBrand'])->find($id);

        $fileName = 'vehicle-maintenance-'.$book->model.'-'.$book->make. time() . '.pdf';
        $pdf = new PDF;
        $pdf = PDF::loadView('vehicle.maintenance', ["item" => $book]);

        $store = Storage::disk('local')->put('downloads/'.$fileName, $pdf->output());

        $path = 'downloads/'.$fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);

    }
}
