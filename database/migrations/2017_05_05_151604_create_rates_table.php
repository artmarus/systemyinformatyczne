<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_photo')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->tinyInteger('rate')->unsigned();
            $table->timestamps();

            $table->index('id_photo');
            $table->index('id_user');
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('id_photo')
                ->references('id')->on('photos')
                ->onDelete('cascade');
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
