<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseSerials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_serials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',65);
            $table->string('domain',120);
            $table->string('phone_number',30)->nullable();
            $table->text('address')->nullable();
            $table->string('serial',120)->unique();
            $table->string('expired',16);
            $table->boolean('logging')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('license_serials');
    }
}
