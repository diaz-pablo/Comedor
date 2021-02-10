<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('starter_id');
            $table->unsignedBigInteger('main_id');
            $table->unsignedBigInteger('dessert_id');
            $table->timestamp('service_at');
            $table->timestamp('publication_at');
            $table->unsignedSmallInteger('available_quantity');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('starter_id')->references('id')->on('starters');
            $table->foreign('main_id')->references('id')->on('mains');
            $table->foreign('dessert_id')->references('id')->on('desserts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
