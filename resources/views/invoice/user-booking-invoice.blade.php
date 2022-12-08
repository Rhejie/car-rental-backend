
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fabcart</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: roboto, arial, helvetica, sans-serif;
            }
            h1,h2,h3,h4,h5,h6{
                margin: 0;
                padding: 0;
            }
            p{
                margin: 0;
                padding: 0;
                font-size: 12px;
            }
            .container{
                width: 100%;
                margin-right: auto;
                margin-left: auto;
            }
            .brand-section{
               background-color: darkcyan;
               padding: 10px 40px;
            }
            .logo{
                width: 50%;
            }

            .row{
                display: flex;
                flex-wrap: wrap;
            }
            .col-6{
                width: 50%;
                flex: 0 0 auto;
            }
            .text-white{
                color: #fff;
            }
            .company-details{
                float: right;
                text-align: right;
            }
            .body-section{
                padding: 16px;
                border: 1px solid gray;
            }
            .heading{
                font-size: 20px;
                margin-bottom: 03px;
            }
            .sub-heading{
                color: #262626;
                margin-bottom: 05px;
            }
            table{
                background-color: #fff;
                width: 100%;
                border-collapse: collapse;
            }
            table thead tr{
                border: 1px solid #111;
                background-color: #f2f2f2;
            }
            table td {
                vertical-align: middle !important;
                text-align: center;
            }
            table th, table td {
                padding-top: 08px;
                padding-bottom: 08px;
                font-size: 12px;
            }
            .table-bordered{
                box-shadow: 0px 0px 5px 0.5px gray;
            }
            .table-bordered td, .table-bordered th {
                border: 1px solid #dee2e6;
            }
            .text-right{
                text-align: end;
            }
            .w-20{
                width: 20%;
            }
            .float-right{
                float: right;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="brand-section">
                <div class="row">
                    <div class="col-6">
                        <h1 class="text-white">APC Car Rental</h1>
                    </div>
                </div>
            </div>

            <div class="body-section">
                <div class="row">
                    <div class="col-6">
                        <h2 class="heading">Invoice</h2>
                        <p class="sub-heading"><span style="font-weight:bold">Full Name:</span>  {{$item->user->last_name}}, {{$item->user->first_name}}, {{$item->user->last_name}}</p>
                        <p class="sub-heading"><span style="font-weight:bold">Email Address:</span> {{$item->user->email}} </p>
                        <p class="sub-heading"><span style="font-weight:bold">Address:</span>  {{$item->user->address}}</p>
                        <p class="sub-heading"><span style="font-weight:bold">Phone Number: </span> {{$item->user->contact_number}}</p>
                    </div>
                    {{-- <div class="col-6" style="margin-top:10px">
                        <p class="sub-heading"><span style="font-weight:bold">Full Name:</span>  {{$item->user->last_name}}, {{$item->user->first_name}}, {{$item->user->last_name}}</p>
                        <p class="sub-heading"><span style="font-weight:bold">Email Address:</span> {{$item->user->email}} </p>
                        <p class="sub-heading"><span style="font-weight:bold">Address:</span>  {{$item->user->address}}</p>
                        <p class="sub-heading"><span style="font-weight:bold">Phone Number: </span> {{$item->user->contact_number}}</p>
                    </div> --}}
                </div>
            </div>

            <div class="body-section">
                <h3 class="heading">Booking Details</h3>
                <br>
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th class="w-20">Booking Start</th>
                            <th class="w-20">Booking End</th>
                            <th >Price</th>
                            <th >Number of Days</th>
                            <th >Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{(\Carbon\Carbon::parse($item->booking_start))->format('M d, Y h:m a')}}</td>
                            <td>{{(\Carbon\Carbon::parse($item->booking_end))->format('M d, Y h:m a')}}</td>
                            <td>{{$item->vehicle->price}}</td>
                            <td>{{(\Carbon\Carbon::parse($item->booking_start))->diffInDays(\Carbon\Carbon::parse($item->booking_end))}}</td>
                            <td>{{$item->booking_status}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Sub Total</td>
                            <td>Php {{((\Carbon\Carbon::parse($item->booking_start))->diffInDays(\Carbon\Carbon::parse($item->booking_end))) * $item->vehicle->price}}</td>
                        </tr>
                    </tbody>
                </table>

                <br>
                <h3 class="heading">Overcharges</h3>
                <br>
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th class="w-20">Type</th>
                            <th class="w-20">Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($item->overcharges as $charge)
                        <tr>
                            <td>{{$charge->overchargeType->name}}</td>
                            <td>{{$charge->charge}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <h3 class="heading">Payment Details</h3>
                <br>
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th class="w-20">Type</th>
                            <th class="w-20">Paid Date</th>
                            <th >Price</th>
                            <th >Method</th>
                            <th >Reference No.</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($item->payments as $payment)
                        <tr>
                            <td>{{$payment->type}}</td>
                            <td>{{(\Carbon\Carbon::parse($item->created_at))->format('M d, Y')}}</td>
                            <td>{{$payment->price}}</td>
                            <td>{{$payment->paymentMode->name}}</td>
                            <td>{{$payment->reference_number}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-6">
                        <h2 class="heading">Driver</h2>
                        <p class="sub-heading"><span style="font-weight:bold">Name: </span> {{$item->add_driver ? $item->driver->name : $item->primary_operator_name}} </p>
                        <p class="sub-heading"><span style="font-weight:bold">License Expiration Date: </span> {{$item->add_driver ? $item->driver->license_expiration_date : $item->primary_operator_license_no}} </p>
                    </div>
                </div>



                {{-- <h3 class="heading"><span style="font-weight:bold">Payment Status:</span> Paid</h3> --}}
            </div>

            <div class="body-section">
                <p>&copy; Copyright 2021 - APC Car Rental. All rights reserved.
                    <a href="https://www.fundaofwebit.com/" class="float-right">www.apccarental.com</a>
                </p>
            </div>
        </div>

    </body>

</html>
