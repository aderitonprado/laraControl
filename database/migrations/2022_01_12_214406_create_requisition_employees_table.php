<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisition_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('func_mat');
            $table->string('func_name', 80);
            $table->string('func_cpf', 11);
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
        Schema::dropIfExists('requisition_employees');
    }
}
