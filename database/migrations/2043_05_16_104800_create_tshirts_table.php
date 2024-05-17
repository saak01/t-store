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
            $table->string('name');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('image_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('image_id')->references('id')->on('files');
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
