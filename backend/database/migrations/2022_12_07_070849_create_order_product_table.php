<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->length(250)->nullable();
            $table->string('product_id')->length(250)->nullable();
            $table->string('category_id')->length(250)->nullable();
            $table->string('product_image')->length(250)->nullable();
            $table->string('name')->length(250)->nullable();
            $table->text('description')->nullable();
            $table->string('price')->length(250)->nullable();
            $table->string('qty')->length(250)->nullable();
            $table->string('main_price')->length(250)->nullable();
            $table->string('new_offer')->length(250)->nullable();
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
        Schema::dropIfExists('order_product');
    }
}
