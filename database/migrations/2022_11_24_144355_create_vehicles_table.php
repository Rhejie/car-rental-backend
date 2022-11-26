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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('color');
            $table->integer('capacity')->nullable();
            $table->string('plate_number')->nullable();
            $table->integer('fuel_capacity')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('fuel_consumption')->nullable();
            $table->integer('odometer')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('publish')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
