<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('name');
            $table->date('birthdate');
            $table->smallInteger('age');
            $table->string('occupation')->default("None");
            $table->text('address')->nullable();
            $table->string('identity')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('profile_picture')->default("none.jpg");
            $table->integer('balance')->default("0");
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
        Schema::dropIfExists('investor');
    }
}
