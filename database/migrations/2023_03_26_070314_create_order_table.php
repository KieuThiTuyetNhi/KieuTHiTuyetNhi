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
            $table->integer('userid');
            $table->string('fullname');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_order');
    }
}
