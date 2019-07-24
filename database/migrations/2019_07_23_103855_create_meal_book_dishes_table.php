<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealBookDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_book_dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meal_book_id')->unsigned();
            $table->unsignedInteger('dish_id')->unsigned();
            $table->foreign('dish_id')->references('id')->on('dish_types');
            $table->foreign('meal_book_id')->references('id')->on('meal_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_book_dishes');
    }
}
