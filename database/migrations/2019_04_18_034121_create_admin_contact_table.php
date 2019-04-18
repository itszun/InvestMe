<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_contact', function (Blueprint $table) {
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_admin')->references('id')->on('admin');
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
        Schema::dropIfExists('admin_contact');
    }
}
