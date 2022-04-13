<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSuppliesAddPumpPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplies', function (Blueprint $table) {
            // adicionar a coluna pump_price ma bomba
            $table->integer('pump_price')->after('hour_meter');
            $table->integer('pump_total_price')->after('pump_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplies', function (Blueprint $table) {
            // remova a coluna pump_price
            $table->dropColumn('pump_price');
            $table->dropColumn('pump_total_price');
        });
    }
}
