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
            $table->integer('admin_id')->nullable();
            $table->foreignId('lead_id')->nullable();
            $table->string('adv_name')->nullable();
            $table->string('operator_name')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('product_weight')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('promotion_id')->nullable();
            $table->integer('promotion_price')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('warehouse')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('subdistrict_id')->nullable();
            $table->string('courier')->nullable();
            $table->integer('shipping_price')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('total_payment')->nullable();
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
