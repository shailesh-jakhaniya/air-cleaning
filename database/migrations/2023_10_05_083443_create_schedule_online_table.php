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
        Schema::create('schedule_online', function (Blueprint $table) {
            $table->id();
            $table->string('service_need')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->longText('description')->nullable();
            $table->string('reschedule')->nullable();
            $table->integer('number_of_furance')->nullable();
            $table->string('location_of_furance')->nullable();
            $table->string('dryer_vent_cleaning')->nullable();
            $table->string('dryer_vent_exit_point')->nullable();
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
        Schema::dropIfExists('schedule_online');
    }
};
