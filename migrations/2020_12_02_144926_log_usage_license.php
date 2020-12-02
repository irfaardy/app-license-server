<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogUsageLicense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_usage_license_serial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('license_serial_id',false);
            $table->string('app_name',120)->nullable();
            $table->string('route_name',125)->nullable();
            $table->bigInteger('usage_count',false);
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
        //
    }
}
