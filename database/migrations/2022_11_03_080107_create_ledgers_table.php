<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('mappedStatus')->default(1)->comment('0=inactive, 1=active');
            $table->string('accType');
            $table->string('accSubType')->nullable();
            $table->string('accNo');
            $table->string('accName');
            $table->string('narration')->nullable();
            $table->double('openBalance')->nullable();
            $table->date('regDate')->nullable();
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
        Schema::dropIfExists('ledgers');
    }
}
