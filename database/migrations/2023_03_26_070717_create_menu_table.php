<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KTTN_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('link',1000);
            $table->unsignedInteger('table_id');
            $table->string('type',100);
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
        Schema::dropIfExists('KTTN_menu');
    }
}
