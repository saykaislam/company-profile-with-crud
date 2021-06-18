<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->default('default.png');
            $table->string('pro_image')->default('default.png');
            $table->text('description')->nullable();
            $table->string('banner_image')->default('default.png');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
