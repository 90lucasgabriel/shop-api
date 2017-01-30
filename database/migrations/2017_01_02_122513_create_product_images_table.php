<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->string('url');
            $table->text('description');
            $table->integer('index');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('product_images');
    }
}
