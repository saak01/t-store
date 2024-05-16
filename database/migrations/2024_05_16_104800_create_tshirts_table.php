<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTshirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tshirts', function (Blueprint $table) {
            $table->id();
            $table->strig('name');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('img_id');
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
        Schema::dropIfExists('tshirts');
    }
}
