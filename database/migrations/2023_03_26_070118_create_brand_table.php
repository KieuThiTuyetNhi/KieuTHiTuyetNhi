<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->string('image',1000);
            $table->unsignedInteger('sort_order');
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_brand');
    }
}
