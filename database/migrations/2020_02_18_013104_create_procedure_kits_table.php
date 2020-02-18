<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id');
            $table->bigInteger('patient_id');
            $table->bigInteger('procedure_id');
            $table->text('barcode');
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
        Schema::dropIfExists('procedure_kits');
    }
}
