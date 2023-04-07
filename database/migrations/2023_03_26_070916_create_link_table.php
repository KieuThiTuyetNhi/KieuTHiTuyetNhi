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
            $table->string('slug',1000);
            $table->unsignedInteger('table_id');
            $table->string('type',100);
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('KTTN_link');
    }
}
