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
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->float('price');
            $table->unsignedInteger('qty');
            $table->float('amount');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('KTTN_orderdetail');
    }
}
