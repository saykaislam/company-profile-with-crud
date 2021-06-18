<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_owner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->string('locality')->nullable();
            $table->string('size_of_land')->nullable();
            $table->string('width_of_road_front')->nullable();
            $table->string('category_of_land')->nullable();
            $table->string('facing')->nullable();
            $table->string('attractive_features')->nullable();

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
        Schema::dropIfExists('land_owner');
    }
}
