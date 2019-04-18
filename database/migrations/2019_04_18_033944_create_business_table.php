<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id')->on('users');
            $table->string('name');
            $table->date('founded');
            $table->text('address');
            $table->string('contact');
            $table->text('description');
            $table->unsignedSmallInteger('sector');
            $table->foreign('sector')->references('id')->on('sector');
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
        Schema::dropIfExists('business');
    }
}
