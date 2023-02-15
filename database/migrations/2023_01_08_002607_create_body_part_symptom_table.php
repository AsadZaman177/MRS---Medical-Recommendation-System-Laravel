<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyPartSymptomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_part_symptom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('body_part_id');
            $table->unsignedBigInteger('symptom_id');
            $table->timestamps();

            $table->foreign('body_part_id')->references('id')->on('body_parts')->onDelete('cascade');
            $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_part_symptom');
    }
}
