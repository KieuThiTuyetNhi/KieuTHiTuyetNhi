<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImageTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_product_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->string('image',1000);
            $table->unsignedInteger('sort_order');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_product_image');
    }
}
