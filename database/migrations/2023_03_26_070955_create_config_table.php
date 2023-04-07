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
            $table->string('site_name',1000);
            $table->string('hotline',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('author',255);
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_config');
    }
}
