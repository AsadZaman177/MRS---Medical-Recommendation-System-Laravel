<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('section_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_btn_text')->nullable();
            $table->text('footer_about')->nullable();
            $table->string('footer_certificate')->nullable();
            $table->string('footer_payment')->nullable();
            $table->string('copyright')->nullable();
            $table->string('page_title')->nullable();
            $table->longText('page_desc')->nullable();
            $table->string('page_bg_img')->nullable();
            $table->string('search_widget_img')->nullable();
            $table->string('search_widget_title')->nullable();
            $table->text('search_widget_desc')->nullable();
            $table->string('buy_widget_img')->nullable();
            $table->string('buy_widget_title')->nullable();
            $table->text('buy_widget_desc')->nullable();
            $table->string('diagnose_img')->nullable();
            $table->string('diagnose_title')->nullable();
            $table->text('diagnose_desc')->nullable();
            $table->string('free_ship_icon')->nullable();
            $table->string('free_ship_title')->nullable();
            $table->text('free_ship_desc')->nullable();
            $table->string('return_icon')->nullable();
            $table->string('return_title')->nullable();
            $table->text('return_desc')->nullable();
            $table->string('secure_icon')->nullable();
            $table->string('secure_title')->nullable();
            $table->text('secure_desc')->nullable();
            $table->string('gifts_icon')->nullable();
            $table->string('gifts_title')->nullable();
            $table->text('gifts_desc')->nullable();
            $table->string('our_products_title')->nullable();
            $table->longText('our_products_desc')->nullable();
            $table->string('countdown_subheading')->nullable();
            $table->string('countdown_heading')->nullable();
            $table->text('countdown_desc')->nullable();
            $table->string('countdown_img')->nullable();
            $table->date('countdown_date')->nullable();
            $table->string('sale_products_title')->nullable();
            $table->longText('sale_products_desc')->nullable();
            $table->string('featured_products_title')->nullable();
            $table->longText('featured_products_desc')->nullable();
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
        Schema::dropIfExists('c_m_s');
    }
}
