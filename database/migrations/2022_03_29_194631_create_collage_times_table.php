<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollageTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collage_times', function (Blueprint $table) {
            $table->id();
            $table->string('period_8')->nullable();
            $table->string('period_9')->nullable();
            $table->string('period_10')->nullable();
            $table->string('period_11')->nullable();
            $table->string('period_12')->nullable();
            $table->string('period_13')->nullable();
            $table->string('period_14')->nullable();
            $table->string('period_15')->nullable();
            $table->foreignId('week_id');
            $table->foreign('week_id')->references('id')->on('weaks')->onDelete('cascade');
            $table->foreignId('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('collage_times');
    }
}
