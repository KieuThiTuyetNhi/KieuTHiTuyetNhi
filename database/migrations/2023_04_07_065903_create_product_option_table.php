<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_product_option', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('description',1000);
            $table->unsignedTinyInteger('status');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_product_option');
    }
}
