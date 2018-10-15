<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->string('pro_name');
            $table->longtext('pro_des');
            $table->float('pro_price');
            $table->string('pro_size');
            $table->string('pro_color');
            $table->integer('pro_pub_stat');
            $table->string('pro_img');
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
        Schema::dropIfExists('product');
    }
}
