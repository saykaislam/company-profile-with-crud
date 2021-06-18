<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('status')->nullable();
            $table->string('image')->default('default.png');
            $table->text('map')->nullable();
            $table->string('pro_image')->default('default.png');
            $table->text('description')->nullable();
            $table->string('banner_image')->default('default.png');
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
        Schema::dropIfExists('real_states');
    }
}
