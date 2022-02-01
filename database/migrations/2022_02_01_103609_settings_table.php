<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SettingsTable extends Migration
{
    public function up()
    {
        // id int [pk, increment] // auto increment
        // instantsi varchar
        // status boolean
        // max_time varchar
        // max_late int

        Schema::create('settings', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('instanstion', 100);
            $table->string('max_time', 100);
            $table->integer('max_late_count')->default(0);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
