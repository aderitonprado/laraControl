<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToThirdPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('third_parties', function (Blueprint $table) {
            // adiciona coluna fleet (placa) na tabela de terceiros
            $table->string('plate', 12)->nullable()->after('third_party_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('third_parties', function (Blueprint $table) {
            // remove a coluna fleet em caso de roolback
            $table->dropColumn('plate');
        });
    }
}
