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
        Schema::create('air_ducts', function (Blueprint $table) {
            $table->id();
            $table->enum('num_of_furnace', [1,2,3])->nullable();
            $table->integer('furnace_loc_sidebyside')->nullable();
            $table->integer('furnace_loc_different')->nullable();
            $table->integer('square_footage_min')->nullable();
            $table->integer('square_footage_max')->nullable();
            $table->integer('final_price')->nullable();
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
        Schema::dropIfExists('air_ducts');
    }
};
