<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_product', function (Blueprint $table) {
            $table->id();//id
            $table->integer('catid');
            $table->integer('brandid');
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->string('metakey');
            $table->string('metadesc');
            $table->string('detail');
            $table->integer('number');
            $table->double('price',12,2);
            $table->double('price_buy',12,2);
            $table->double('price_sale',12,2);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('KTTN_product');
    }
}
