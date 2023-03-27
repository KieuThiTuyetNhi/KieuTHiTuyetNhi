<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_topic', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('parentid');
            $table->integer('orders');
            $table->string('img');
            $table->string('metakey');
            $table->string('metadesc');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_topic');
    }
}
