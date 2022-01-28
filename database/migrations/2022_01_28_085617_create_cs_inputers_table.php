<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsInputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_inputers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inputer_id');
            $table->unsignedBigInteger('cs_id');
            $table->foreign('inputer_id')->references('id')->on('users');
            $table->foreign('cs_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_inputers');
    }
}
