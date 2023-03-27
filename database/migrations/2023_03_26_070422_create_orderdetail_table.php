<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailTable extends Migration
{
    
    public function up()
    {
        Schema::create('KTTN_orderdetail', function (Blueprint $table) {
            $table->id();//id
            $table->integer('orderid');
            $table->integer('productid');
            $table->double('price',12,2);
            $table->integer('number');
            $table->double('amount',12,2);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_orderdetail');
    }
}
