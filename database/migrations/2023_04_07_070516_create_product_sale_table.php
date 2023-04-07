<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_product_sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->float('price_sale');
            $table->dateTime('date_begin');
            $table->dateTime('date_end');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('KTTN_product_sale');
    }
}
