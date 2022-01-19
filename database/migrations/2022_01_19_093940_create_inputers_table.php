<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputers', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->foreignId('lead_id');
            $table->string('adv_name');
            $table->string('operator_name');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('customer_address');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('warehouse');
            $table->string('courier');
            $table->string('payment_method');
            $table->integer('total_payment');
            $table->string('payment_proof')->nullable();
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
        Schema::dropIfExists('inputers');
    }
}
