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
        Schema::create('dryer_vents', function (Blueprint $table) {
            $table->id();
            $table->enum('dryer_vent_exit_point', ['0-10 Feet Off the Ground','10+ Feet Off the Ground', 'Rooftop']);
            $table->integer('price')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dryer_vents');
    }
};
