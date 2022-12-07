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
</style>

<body>
    <div style="width: 100%">
        <header>
            <center style="line-height:10px; padding-bottom: 30px">
                <h3>APC CAR RENTAL</h3>
                <h5>Car Rental Agreement</h5>
            </center>
        </header>
        <main>
            <div class="">
                <p>This Car Rental Agreement is entered into between APC RENT A CAR hereinafter known as the owner and
                    <span class="font-bold">{{ $item->user->last_name }}, {{ $item->user->first_name }}
                        {{ $item->user->middle_name }}</span> hereinafter known as the RENTER, (collectively known as
                    the parties) which outlines the respective rights and obligations of the parties relating to the
                    rental of the car.
                </p>
                <br />
                <div style="line-height: 9px">
                    <p><span class="font-bold">1. IDENTIFICATION OF THE RENTED VEHICLE</span></p>
                    <p style="margin-left:10px">The owner hereby agrees to rent out to the RENTER the vehicle described
                        as follow:</p>
                    <div style="line-height: 20px">
                        <center>
                            <table class="table-bordered" style="width:70%;">
                                <tbody>
                                    <tr>
                                        <td>
                                            Make:
                                        </td>
                                        <td>
                                            <span class="font-bold float:left">{{ $item->vehicle->make }}</span>
                                        </td>
                                        <td>
                                            Model:
                                        </td>
                                        <td>
                                            <span class="font-bold float:left">{{ $item->vehicle->model }}</span>
                                        </td>
                                        <td>
                                            Plate:
                                        </td>
                                        <td>
                                            <span class="font-bold float:left">{{ $item->vehicle->plate_number }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            CR #:
                                        </td>
                                        <td>
                                            <span class="font-bold float:left">{{ $item->vehicle->cr_no }}</span>
                                        </td>
                                        <td>
                                            OR #:
                                        </td>
                                        <td>
                                            <span class="font-bold float:left">{{ $item->vehicle->or_no }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>
                    <p><span class="font-bold">2. Rental Term</span></p>
                    <div style="line-height: 20px">
                        <p style="margin-left:10px ">
                            The term of this car rental agreement runs (3) three years of vehicle pickup as indicated
                            just above the signature
                            line at the bottom of this agreement until the return of the vehicle to the OWNE, and
                            completion of all terms this
                            agreement by both parties The estimated rental term is as follows:
                        </p>
                        <div style="line-height: 20px">
                            <center>
                                <table class="table-bordered" style="width:70%;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 300px; text-align:right">
                                                Estimated start time and date:
                                            </td>
                                            <td colspan="3">
                                                <span
                                                    class="font-bold float:left">{{ \Carbon\Carbon::parse($item->booking_start)->format('M d, Y h:m a') }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px; text-align:right">
                                                Estimated end time and date:
                                            </td>
                                            <td colspan="3">
                                                <span
                                                    class="font-bold float:left">{{ \Carbon\Carbon::parse($item->booking_end)->format('M d, Y h:m a') }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px; text-align:right">
                                                Destination:
                                            </td>
                                            <td colspan="3">
                                                <span class="font-bold float:left">{{ $item->destination }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right">
                                                Check out: Mileage:
                                            </td>
                                            <td>
                                                <span
                                                    class="font-bold float:left">{{ $item->vehicle->odometer }}</span>
                                            </td>
                                            <td style="text-align:right">
                                                Fuel:
                                            </td>
                                            <td>
                                                <span class="font-bold">_______________</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right">
                                                Return: Mileage:
                                            </td>
                                            <td>
                                                <span class="font-bold">_______________</span>
                                            </td>
                                            <td style="text-align:right">
                                                Fuel:
                                            </td>
                                            <td>
                                                <span class="font-bold">_______________</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </div>
                        <p>The parties may shorten or extend the estimated term of rental by mutual consent.</p>
                        <br />
                        <p><span class="font-bold">3. SCOPE OF USE</span></p>
                        <p>RENTER will use the rented vehicle for personal or routine business use only, and operate the
                            rented vehicle only on properly
                            maintained roads in the agreed location and destination.</p>

                        <p>
                            RENTER is not allowed to use the vehicle as a practice vehicle by student drivers nor use
                            the same for driving lessons. In case
                            of violation of this condition, RENTER shall pay a fine P5, 000.00.
                        </p>
                        <p>
                            RENTER shall not sublease the rented vehicle or use it as a vehicle for hire, RENTER will
                            use the vehicle only up to <span class="font-bold">{{ $item->destination }}</span>
                            and shall inform the OWNER in case he desires to extend his use to
                            ___________________________________________.
                        </p>
                        <p>
                            RENTER will not allow any other person to operate the rented vehicles identified here:
                        </p>
                        <p>Primary vehicle operator (RENTER): <span
                                class="font-bold">{{ $item->add_driver ? $item->driver->name : $item->primary_operator_name }}</span>
                        </p>
                        <p>Driver's License No. <span
                                class="font-bold">{{ $item->add_driver ? $item->driver->license_no : $item->primary_operator_license_no }}</span>
                        </p>
                        <p>Additional vehicle operator-1: <span
                                class="font-bold">{{ $item->secondary_operator_name ? $item->secondary_operator_name : null }}</span>
                        </p>
                        <p>Driver's License No. <span
                                class="font-bold">{{ $item->secondary_operator_license_no ? $item->secondary_operator_license_no : null }}</span>
                        </p>
                    </div>
                    <div style="width: 100%; line-height: 20px">
                        <p><span class="font-bold">4. RENTAL FEES AND DOCUMENTARY REQUIREMENTS</span></p>
                        <p>Rental fees for the rented vehicle shall be as follows:</p>
                        <p><span class="font-bold">a.)</span> The RENTER of the vehicle shall be on daily basis. One day
                            is equivalent to twenty four (24) hours. Use of the
                            vehicle beyond the agreed return as specified in paragraph ___________________________
                            hereof shall be subject to a penalty.</p>
                        <p><span class="font-bold">b.)</span> The RENTER shall pay in advance the full amount of the
                            rental prior to the release of the unit and provide the
                            following documents to the OWNER.</p>
                        <div style="margin-left:15px">
                            <p><span class="font-bold">1.</span> Passport (P3, 000.00 deposit if no reason).</p>
                            <p><span class="font-bold">2.</span> 3 Government Issued ID's.</p>
                            <p><span class="font-bold">3.</span> Photocopy of Driver's License.</p>
                            <p><span class="font-bold">4.</span> Proof of Billing (Electricity).</p>
                            <p><span class="font-bold">5.</span> SECURITY DEPOSIT.</p>
                        </div>
                        <p><span class="font-bold">5. SECURITY DEPOSIT</span></p>
                        <p>
                            RENTER will be required to provide a security deposit to the OWNER in the amount of P5,
                            000.00 if the rented
                            vehicle is either an SUV, Pickup, or Van, to be used in the event of loss or damage to the
                            rented vehicle during the
                            term of this contract. In the event of damage to the rented vehicle, OWNER will apply this
                            security deposit to defray
                            the cost of necessary repairs or replacements. It the cost repair or replacement of damage
                            exceeds the amount of
                            the security deposit, RENTER shall be responsible for payment to the OWNER of the balance at
                            the cost replacements. If the cost repair or replacement of damage exceeds to the amount of
                            the security deposit, RENTER shall be
                            responsible for payment to the OWNER of the balance of the cost.
                        </p>
                        <p><span class="font-bold">6. INDEMNIFICATION</span></p>
                        <p>RENTER agrees to indemnify, defend and hold harmless to the OWNER for the loss, damage, or
                            14egal action against the OWNER as a result of RENTERS operation or use of the rented
                            vehicle. This includes
                            attorney’s fees necessarily incurred for these purposes. RENTER shall also pay for parking
                            ticket fines, traffic
                            violations of other citations while in possession of the rented vehicle.</p>
                        <p><span class="font-bold">7. REPRESTATIONS AND WARRANTIES</span></p>
                        <p>
                            OWNER represents and warrants that to OWNER'S knowledge, the rented vehicle is in good
                            condition and is safe for ordinary operation of the vehicle.
                        </p>
                        <p>RENTER represents and warrants that RENTER is legally entitled to drive a motor vehicle under
                            the
                            laws of the Philippines and will not drive it in violation of any laws, or in negligent of
                            illegal manner.</p>
                        <p>RENTER has been given an opportunity examine the rented vehicle in advance of taking
                            possession
                            of it, and upon such inspection, is not aware of any damage existing on vehicle.</p>
                        <p><span class="font-bold">8. LOSS, DAMAGES. AND OTHER</span></p>
                        <p>For Accessories: All loses or damages not chargeable to insurance like radio, tools, tires,
                            rims, mirror
                            and other car accessories shall be paid by the renter. In case of loss of car key the RENTER
                            shall pay the
                            amount of five thousand (P10, 000.00) which amounts shall be used to secure a replacement
                            key from the
                            manufacturer/dealer.</p>
                        <p>
                            For Vehicle: Renter must secure police report, photocopy of driver's license and will
                            pay/shoulder
                            all the expenses for the total parts replacement, exclusive of insurance liability amounting
                            to The RENTER
                            is liable to pay the rental fee per day of the vehicle in case the vehicle is still under
                            repair.
                        </p>
                        <p>
                            Flat Tires: Vulcanizing charges for flat tires shall be for the account of the renter.
                        </p>
                        <p><span class="font-bold">9. JURISDICTION AND VENUE</span></p>
                        <p>All lawsuits involving or arising out of this agreement shall brought exclusively in the
                            courts in Panabo
                            City to the exclusion of all others</p>
                        <p><span class="font-bold">10. ENTIRE AGREEMENT</span></p>
                        <p>
                            This Car Rental Agreement constitutes the entire agreement between the parties with respect
                            to
                            this rental arrangement. No modification to this agreement can be made in writing signed by
                            both parties.
                        </p>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Agree. <u>{{\Carbon\Carbon::now()->format('Y-m-d h:m a')}}</u>, Panabo City.</td>
                                    </tr>

                                    <tr>
                                        <td><center>(Date)</center></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Reference Person:</td>
                                        <td>____________________</td>
                                        <td>Address:</td>
                                        <td>____________________</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <br/>
                        <div  style="width: 100%;">
                            <center>
                                <div>
                                    <span class="font-bold">{{$item->user->last_name}}, {{$item->user->first_name}} {{$item->user->middle_name}}</span>
                                </div>
                                <div style="width: 400px; border-top: 1px solid gray; margin:auto">
                                    (Renter's Printed Name &Signature)
                                </div>
                            </center>
                        </div>
                        <br/>
                        <br/>
                        <div  style="width: 100%;">
                            <center>
                                <div>
                                    <span class="font-bold">{{$item->add_driver ? $item->driver->license_no : $item->primary_operator_license_no}}</span>
                                </div>
                                <div style="width: 400px; border-top: 1px solid gray;  margin:auto">
                                    (Driver's License)
                                </div>
                            </center>
                        </div>
                        <br/>
                        <br/>
                        <div style="width: 100%;">
                            <center>
                                <div>
                                    <span class="font-bold">{{$item->user->address}}</span>
                                </div>
                                <div style="width: 400px; border-top: 1px solid gray;  margin:auto">
                                    (Home Address and Business/Office Address)
                                </div>
                            </center>
                        </div>
                        <br/>
                        <br/>
                        <div style="width: 100%;">
                            <center>
                                <div>
                                    <span class="font-bold">{{$item->user->contact_number}}</span>
                                </div>
                                <div style="width: 400px; border-top: 1px solid gray;  margin:auto">
                                    (Landline and Cellular No.)
                                </div>
                            </center>
                        </div>
                        <br/>
                        <br/>
                        <div style="width: 100%;">
                            <center>
                                <div style="width: 400px; border-top: 1px solid gray;  margin:auto">
                                   <p>
                                    (APC CAR RENTAL)
                                   </p>
                                   <p>Owner</p>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
