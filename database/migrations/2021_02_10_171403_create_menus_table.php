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
            $table->unsignedBigInteger('starter_id')->nullable();
            $table->unsignedBigInteger('main_id')->nullable();
            $table->unsignedBigInteger('dessert_id')->nullable();
            $table->date('service_at')->unique();
            $table->date('publication_at')->nullable();
            $table->unsignedSmallInteger('available_quantity')->nullable();
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
