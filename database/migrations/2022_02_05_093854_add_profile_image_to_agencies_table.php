<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImageToAgenciesTable extends Migration
{
    public function up()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->string('profile_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->dropColumn('profile_image');
        });
    }
}
