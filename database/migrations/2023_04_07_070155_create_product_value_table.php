<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductValueTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_product_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('option_id');
            $table->unsignedInteger('sort_order');
            $table->string('value',255);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedInteger('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_product_value');
    }
}
