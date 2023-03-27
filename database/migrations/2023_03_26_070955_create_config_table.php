<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_config', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('hotline');
            $table->string('email');
            $table->string('logo');
            $table->string('icon');
            $table->string('metakey');
            $table->string('metadesc');
            $table->string('images');
            $table->integer('status');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_config');
    }
}
