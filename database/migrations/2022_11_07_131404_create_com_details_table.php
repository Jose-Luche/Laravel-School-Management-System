<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('brCode')->nullable();
            $table->string('country')->nullable();
            $table->string('cCode')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('city')->nullable();
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phLocation')->nullable();
            $table->string('logo')->nullable();
            $table->string('payOptions')->nullable();
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
        Schema::dropIfExists('com_details');
    }
}
