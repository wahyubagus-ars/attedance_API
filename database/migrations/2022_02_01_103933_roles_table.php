<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesTable extends Migration
{
    public function up()
    {
        // id int [pk, increment]
        // role varchar

        Schema::create('roles', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('role', 100);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
