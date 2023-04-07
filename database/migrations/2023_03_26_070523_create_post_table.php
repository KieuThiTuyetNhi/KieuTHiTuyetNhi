<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_post', function (Blueprint $table) {
            $table->id();//id
            $table->unsignedInteger('topic_id');
            $table->string('title',1000);
            $table->string('slug',1000);
            $table->longText('detail');
            $table->string('images',1000);
            $table->string('type',100);
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
        Schema::dropIfExists('KTTN_post');
    }
}
