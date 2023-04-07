<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KTTN_contact', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name',1000);
            $table->string('email',1000);
            $table->string('phone',1000);
            $table->string('title',255);
            $table->text('content');
            $table->unsignedInteger('replay_id');
            $table->unsignedInteger('updated_id');
            $table->unsignedTinyInteger('status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KTTN_contact');
    }
}
