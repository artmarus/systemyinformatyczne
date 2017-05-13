<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBlobToLongBlobColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function(Blueprint $table) {
            $table->dropColumn('photo');
        });

        DB::statement("ALTER TABLE `photos` ADD photo LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function(Blueprint $table) {
            $table->dropColumn('photo');
            $table->binary('photo');
        });
    }
}
