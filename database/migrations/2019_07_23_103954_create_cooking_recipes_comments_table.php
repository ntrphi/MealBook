<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingRecipesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_recipes_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cooking_recipes_id')->nullable();
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('point')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('cooking_recipes_id')->references('id')->on('cooking_recipes')->onDelete('SET NULL');
            $table->foreign('point')->references('id')->on('points')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooking_recipes_comments');
    }
}
