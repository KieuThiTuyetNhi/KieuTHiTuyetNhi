<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_categogy', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->unsignedInteger('parent_id');
            $table->unsignedInteger('sort_order');
            $table->string('image',1000);
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();

        });
    }

   
    public function down()
    {
        Schema::dropIfExists('KTTN_categogy');
    }
}
