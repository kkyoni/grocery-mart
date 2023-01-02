<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->length(250)->nullable();
            $table->string('user_id')->length(250)->nullable();
            $table->string('address_id')->length(250)->nullable();
            $table->string('promo_id')->length(250)->nullable();
            $table->string('comment')->length(250)->nullable();
            $table->string('grandtotal')->length(250)->nullable();
            $table->enum('status',['processing','accepted','ontheway','delivered','cancelled'])->default('processing');
            $table->enum('payment_mode',['cod','paypal'])->default('cod');
            $table->string('date')->length(250)->nullable();
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
        Schema::dropIfExists('order');
    }
}
