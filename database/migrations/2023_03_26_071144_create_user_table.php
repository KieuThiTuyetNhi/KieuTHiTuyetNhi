<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
   
    public function up()
    {
        Schema::create('KTTN_user', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment('Họ');
            $table->string('username',255);
            $table->string('password',255);
            $table->string('email',255);
            $table->string('phone',20);
            $table->string('address',255);
            $table->string('gender',255);
            $table->string('roles',255);
            $table->string('image',255);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('KTTN_user');
    }
}
