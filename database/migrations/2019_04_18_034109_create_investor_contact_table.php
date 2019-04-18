<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_contact', function (Blueprint $table) {
            $table->unsignedBigInteger('id_investor');
            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_investor')->references('id')->on('investor');
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
        Schema::dropIfExists('investor_contact');
    }
}
