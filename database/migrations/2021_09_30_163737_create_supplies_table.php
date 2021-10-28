<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();

            $table->foreignId("user_id")->constrained()->cascadeOnDelete();

            $table->integer('supply_pump');
            $table->date('supply_date');
            $table->integer('warehouse');
            $table->bigInteger("people_code")->nullable();
            $table->bigInteger("vehicles_code")->nullable();
            $table->bigInteger('vehicles_fleet');
            $table->integer('client_type');
            $table->string('vehicles_last_km');
            $table->string('vehicles_plate');
            $table->string('obs')->nullable();
            $table->integer('qtd');
            $table->bigInteger('pump_start');
            $table->bigInteger('pump_end');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('hour_meter');
            $table->integer('userid_update')->nullable();

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
        Schema::dropIfExists('supplies');
    }
}
