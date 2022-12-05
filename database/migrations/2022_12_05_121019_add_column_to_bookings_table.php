<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('primary_operator_name')->nullable();
            $table->text('primary_operator_license_no')->nullable();
            $table->text('secondary_operator_name')->nullable();
            $table->text('secondary_operator_license_no')->nullable();

            $table->dropForeign('bookings_vehicle_place_id_foreign');
            $table->dropColumn('vehicle_place_id');

            $table->string('destination')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
