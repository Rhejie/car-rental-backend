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

</style>

<body>
    <center>
        <center style="line-height:10px; padding-bottom: 30px">
            <h1>APC CAR RENTAL</h1>
            <h3><i>TADECO ROAD, NEW VISAYAS, PANABO CITY</i></h3>
            <h5>TRANSACTION FORM</h5>
        </center>
        <center>
            <div style="width:100%">
                <div style="width:100%;">
                    <span style="font-weight: bold">DATE:
                        {{ \Carbon\Carbon::parse($item->booking_start)->format('M d, Y') }}</span>
                </div>
                <div style="width:100%;">
                    <center style="width:100%">
                        <table class="table-bordered" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td style="text-align: right; width: 25%">
                                        <span style="font-weight: bold">RENTERS NAME: </span>
                                    </td>
                                    <td style=" width: 25%">
                                        <div style="border-bottom: 1px solid gray; width:auto">
                                            <center style="margin-top:20px">{{ $item->user->last_name }}</center>
                                        </div>
                                        <div style="width:auto ">
                                            <center><span style="font-weight: bold;">LAST NAME</span></center>
                                        </div>
                                    </td>
                                    <td style=" width: 25%">
                                        <div style="border-bottom: 1px solid gray; width:auto">
                                            <center style="margin-top:20px">{{ $item->user->first_name }}</center>
                                        </div>
                                        <div style=" width:auto">
                                            <center><span style="font-weight: bold; ">FIRST NAME</span></center>
                                        </div>
                                    </td style=" width: 25%">
                                    <td style="  width: 25%">
                                        <div style="border-bottom: 1px solid gray; width:auto">
                                            <center style="margin-top:20px">
                                                {{ $item->user->middle_name ? $item->user->middle_name : 'N/A' }}
                                            </center>
                                        </div>
                                        <div style=" width:auto">
                                            <center><span style="font-weight: bold;">MIDDLE NAME</span></center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; width: 25%">
                                        <span style="font-weight: bold">DRIVER'S NAME: </span>
                                    </td>
                                    <td colspan="3" style=" width: 75%">
                                        <div style="border-bottom: 1px solid gray; width:auto">
                                            <center style="margin-top:px">
                                                {{ $item->add_driver && $item->driver && $item->driver->id ? $item->driver->name : $item->primary_operator_name }}
                                                -
                                                {{ $item->add_driver && $item->driver && $item->driver->id ? $item->driver->license_no : $item->primary_operator_license_no }}
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;  width: 25%">
                                        <span style="font-weight: bold">PURPOSE OF TRAVEL: </span>
                                    </td>
                                    <td colspan="3" style="width: 75%">
                                        <div style="border-bottom: 1px solid gray;  ">
                                            <center style="margin-top:px">{{ $item->booking_purpose }}</center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right ;  width: 25%; ">
                                        <span style="font-weight: bold">TRIP / DESTINATION: </span>
                                    </td>
                                    <td colspan="3" style="width: 75%">
                                        <div style="border-bottom: 1px solid gray;  ">
                                            <center style="margin-top:px">{{ $item->destination }}</center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;  width: 25%;">
                                        <span style="font-weight: bold;">UNIT: </span>
                                    </td>
                                    <td>
                                        <div style="border-bottom: 1px solid gray; ">
                                            <center style="">{{ $item->vehicle->model }} |
                                                {{ $item->vehicle->make }}
                                                | {{ $item->vehicle->vehicleBrand->name }}</center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;">
                                        <span style="font-weight: bold;">PLATE NUMBER: </span>
                                    </td>
                                    <td>
                                        <div style="border-bottom: 1px solid gray; ">
                                            <center style="">{{ $item->vehicle->plate_number }}</center>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>

                    <br />
                    <br />
                    <br />
                    <div style="">
                        <center>{{ $item->user->last_name }}, {{ $item->user->first_name }}
                            {{ $item->user->middle_name }}</center>
                        <center><span style="font-weight: bold; border-top: 1px solid gray;">PRINTED NAME /
                                SIGNATURE</span>
                        </center>
                    </div>
                </div>
            </div>
        </center>
    </center>

</body>

</html>
