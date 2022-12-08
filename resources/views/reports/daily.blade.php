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
                <h4>Daily Report</h4>
                <h5>{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</h5>
            </center>
        </header>
        <main>
            <table class="table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="w-20">Transaction Date</th>
                        <th class="w-20">Type</th>
                        <th class="w-20">Process</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="text-align:center">
                            <td><center>{{$item->created_at}}</center></td>
                            <td><center>{{ $item->type }}</center></td>
                            <td><center>{{$item->process}}</center></td>
                            <td>
                                @if ($item->type == 'booking')
                                    <table style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 700">
                                                    Booking Start
                                                </td>
                                                <td style="font-weight: 700">
                                                    Booking End
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->transactionable->booking_start)->format('M d, Y h:m a') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->transactionable->booking_end)->format('M d, Y h:m a') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 700">
                                                    Destination
                                                </td>
                                                <td style="font-weight: 700">
                                                    Vehicle
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="">
                                                    {{$item->transactionable->destination}}
                                                </td>
                                                <td style="">
                                                    {{$item->transactionable->vehicle->model}} | {{$item->transactionable->vehicle->make}} | {{$item->transactionable->vehicle->plate_number}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                                @if ($item->type == 'payment')
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: 700">
                                                Payment Mode
                                            </td>
                                            <td style="font-weight: 700">
                                                Type
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ $item->transactionable->paymentMode->name }}
                                            </td>
                                            <td>
                                                {{ $item->type }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 700">
                                                Price
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 700">
                                                {{$item->transactionable->price}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                                @if ($item->type == 'overcharge')
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: 700">
                                                Overcharge
                                            </td>
                                            <td style="font-weight: 700">
                                                Charge
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ $item->transactionable->overchargeType->name }}
                                            </td>
                                            <td>
                                                {{ $item->transactionable->charge }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                                @if($item->type == 'vehicle_maintenance')
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: 700">
                                                Date
                                            </td>
                                            <td style="font-weight: 700">
                                                Type
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->transactionable->Date)->format('M d, Y') }}
                                            </td>
                                            <td>
                                                {{ $item->transactionable->type_of_maintenance }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 700">
                                                Price
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{ $item->transactionable->price}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                            </td>
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
