<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id');
            $table->string('image')->default('default.png');
            $table->string('url')->nullable();
            $table->timestamps();
//            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_images');
    }
}
