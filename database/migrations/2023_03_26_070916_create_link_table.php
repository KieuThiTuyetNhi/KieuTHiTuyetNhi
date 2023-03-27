<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_link', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('tableid');
            $table->string('type');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('KTTN_link');
    }
}
