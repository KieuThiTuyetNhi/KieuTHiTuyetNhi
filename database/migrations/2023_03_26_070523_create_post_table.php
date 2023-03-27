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
            $table->integer('topicid');
            $table->integer('title');
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->string('metakey');
            $table->string('metadesc');
            $table->string('detail');
            $table->string('type');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_post');
    }
}
