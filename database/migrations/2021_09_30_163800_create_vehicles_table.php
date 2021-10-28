<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
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

            $table->foreignId("user_id")->constrained()->cascadeOnDelete();

            $table->string('description')->length(50);
            $table->integer('fleet');
            $table->string('board')->length(15);
            $table->string('renavam')->length(20);
            $table->year('year')->length(4);
            $table->year('model')->length(4);
            $table->string('category')->length(40);
            $table->string('owner')->length(20);
            $table->date('ipva_expiration');
            $table->double('ipva_value');
            $table->string('ipva_status')->length(10);
            $table->integer('status')->length(1);

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
        Schema::dropIfExists('vehicles');
    }
}
