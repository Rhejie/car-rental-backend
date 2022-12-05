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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->decimal('price', 20, 2)->nullable()->comment('per day');
            $table->string('make')->nullable();
            $table->double('battery_lifespan')->nullable();
            $table->date('battery_date_used')->nullable();
            $table->double('tires_lifespan')->nullable();
            $table->date('tires_date_used')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
};
