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
        Schema::create('tracker_coordinates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->string('lat')->nullable();
            $table->foreignId('tracker_id')->constrained('trackers')->cascadeOnDelete();
            $table->string('lon')->nullable();
            $table->string('speed')->nullable();
            $table->string('bearing')->nullable();
            $table->string('altitude')->nullable();
            $table->string('accuracy')->nullable();
            $table->string('batt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracker_coordinates');
    }
};
