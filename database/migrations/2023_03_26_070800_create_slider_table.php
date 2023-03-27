<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_slider', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->string('img');
            $table->string('posistion');
            $table->integer('orders');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_slider');
    }
}
