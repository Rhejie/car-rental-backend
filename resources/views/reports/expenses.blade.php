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
                <h3>Expenses Report</h3>
                <h4>Total Expenses: {{$total}}</h4>
                <h5>{{ $month ? $month : '' }} {{$year ? $year: ''}}</h5>
            </center>
        </header>
        <main>
            <table class="table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="w-20">Date</th>
                        <th>Type</th>
                        <th class="w-20">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="text-align:center">
                            <td><center>{{\Carbon\Carbon::parse($item->Date)->format('M d, Y')}}</center></td>
                            <td><center>{{$item->type_of_maintenance}}</center></td>
                            <td><center>{{ $item->price }}</center></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>
