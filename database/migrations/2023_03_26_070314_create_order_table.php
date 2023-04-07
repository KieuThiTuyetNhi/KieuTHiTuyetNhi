<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name',255);
            $table->string('phone',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->text('note');
            $table->unsignedTinyInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_order');
    }
}
