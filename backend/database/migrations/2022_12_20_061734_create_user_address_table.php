<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->length(250)->nullable();
            $table->string('zip')->length(250)->nullable();
            $table->string('street_address')->length(250)->nullable();
            $table->string('optional')->length(250)->nullable();
            $table->string('city')->length(250)->nullable();
            $table->string('states')->length(250)->nullable();
            $table->string('country')->length(250)->nullable();
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
        Schema::dropIfExists('user_address');
    }
}
