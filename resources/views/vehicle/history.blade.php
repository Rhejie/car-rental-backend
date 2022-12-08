<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>

</head>
<style>
    body {
        font-family: roboto, arial, helvetica, sans-serif;
    }

    p {
        font-size: 15px;
    }

    .font-bold {
        font-weight: 700;
    }

    .table-bordered {
        box-shadow: 0px 0px 5px 0.5px gray;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;

        padding: 5px;

    }

    .table-bordered td {
        padding: 5px;
        font-size: 12px
    }

    .table-bordered th {
        background-color: darkcyan;
        color: #fff;
    }
</style>

<body>
    <div style="width: 100%">
        <header>
            <center style="line-height:10px; padding-bottom: 30px">
                <h2>APC CAR RENTAL</h2>
                <h4>Booking history</h4>
                <h5>{{ $item->model }} | {{ $item->make }} | {{ $item->vehicleBrand->name }}</h5>
            </center>
        </header>
        <main>
            <table class="table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="w-20">Date Created</th>
                        <th class="w-20">Schedule</th>
                        <th class="w-20">Destination</th>
                        <th>Days</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->bookings as $booking)
                        <tr class="text-align:center">
                            <td><center>{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y') }}</center></td>
                            <td><center>{{ \Carbon\Carbon::parse($booking->booking_start)->format('M d, Y h:m:s a') }} - {{ \Carbon\Carbon::parse($booking->booking_end)->format('M d, Y h:m:s a') }}</center></td>
                            <td><center>{{$booking->destination}}</center></td>
                            <td><center>{{ \Carbon\Carbon::parse($booking->booking_start)->diffInDays(\Carbon\Carbon::parse($booking->booking_end)) }}</center>
                            </td>
                            <td><center>{{ $booking->booking_status }}</center></td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                        <td colspan="4" class="text-right">Sub Total</td>
                        <td>Php {{((\Carbon\Carbon::parse($item->booking_start))->diffInDays(\Carbon\Carbon::parse($item->booking_end))) * $item->vehicle->price}}</td>
                    </tr> --}}
                    {{-- <tr>
                        <td colspan="4" class="text-right">Tax Total %1X</td>
                        <td> 2</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td> 12.XX</td>
                    </tr> --}}
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>
