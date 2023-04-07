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
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->float('price');
            $table->longText('detail');
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->unsignedTinyInteger('created_by');
            $table->unsignedTinyInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('KTTN_product');
    }
}
