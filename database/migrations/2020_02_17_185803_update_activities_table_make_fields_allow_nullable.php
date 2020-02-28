<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActivitiesTableMakeFieldsAllowNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('creator_type')->nullable()->change();
            $table->unsignedBigInteger('organization_id')->nullable()->change();
            $table->unsignedBigInteger('facility_id')->nullable()->change();
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['facility_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id')->change();
            $table->unsignedBigInteger('facility_id')->change();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->string('creator_type')->change();
        });
    }
}
