<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('preferred_size')->nullable();
            $table->string('car_parking')->nullable();
            $table->string('expected_handover_date')->nullable();
            $table->string('facing_apartment')->nullable();
            $table->string('preferred_floor')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
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
        Schema::dropIfExists('buyers');
    }
}
