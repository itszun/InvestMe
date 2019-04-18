<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_business');
            $table->foreign('id_business')->references('id')->on('business');
            $table->unsignedBigInteger('id_investor');
            $table->foreign('id_investor')->references('id')->on('investor');
            $table->unsignedBigInteger('id_offer');
            $table->foreign('id_offer')->references('id')->on('offer');
            $table->timestamp('deal_at');
            $table->string('contract');
            $table->boolean('valid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invest');
    }
}
