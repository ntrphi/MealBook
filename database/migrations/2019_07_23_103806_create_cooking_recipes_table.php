<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('dish_type_id')->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->string('avatar');
            $table->text('ingredient');
            $table->text('recipe');
             $table->softDeletes();
            $table->timestamps();
            $table->foreign('dish_type_id')->references('id')->on('dish_types')->onDelete('SET NULL');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooking_recipes');
    }
}
