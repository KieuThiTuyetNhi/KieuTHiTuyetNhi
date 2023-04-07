<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStoreTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_product_store', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->float('price');
            $table->unsignedInteger('qty');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_product_store');
    }
}
