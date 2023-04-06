<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('sku');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('gender')->nullable();
            $table->foreignId('age_id')->constrained('ages');
            $table->foreignId('medicine_type_id')->constrained('medicine_types');
            $table->foreignId('medicine_formulae_id')->constrained('medicine_formulaes');
            $table->foreignId('medicine_brand_id')->constrained('medicine_brands');
            $table->foreignId('medicine_company_id')->constrained('medicine_companies');
            $table->foreignId('medicine_category_id')->constrained('medicine_categories');
            $table->foreignId('body_part_id')->constrained('body_parts');
            $table->boolean('is_featured');
            $table->boolean('is_onsale');
            $table->decimal('price')->nullable();
            $table->decimal('sale_price')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('remaining_stock')->nullable();
            $table->longText('description');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('medicines');
    }
}
