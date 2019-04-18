<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entre_contact', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entrepreneur');
            $table->foreign('id_entrepreneur')->references('id')->on('entrepreneur');
            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_contact')->references('id')->on('contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entre_contact');
    }
}
