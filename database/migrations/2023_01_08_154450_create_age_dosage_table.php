<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeDosageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_dosage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('age_id');
            $table->unsignedBigInteger('dosage_id');
            $table->timestamps();

            $table->foreign('age_id')->references('id')->on('ages')->onDelete('cascade');
            $table->foreign('dosage_id')->references('id')->on('dosages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_dosage');
    }
}
