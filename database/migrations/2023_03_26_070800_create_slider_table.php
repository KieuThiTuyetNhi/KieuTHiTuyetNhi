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
            $table->string('name',1000);
            $table->string('link',1000);
            $table->unsignedInteger('sort_order');
            $table->string('image',1000);
            $table->string('posistion',255);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_slider');
    }
}
