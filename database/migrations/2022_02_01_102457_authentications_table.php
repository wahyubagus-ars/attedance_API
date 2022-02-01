<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuthenticationsTable extends Migration
{
    public function up()
    {
        // id int [pk, increment] // auto-increment
        // email varchar [unique]
        // password varchar
        // staus boolean
        // role_id int [ref: > roles.id]
        // created_at timestamp

        Schema::create('authentications',  function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('email', 64)->unique();
            $table->string('password', 100);
            $table->integer('role_id')->unsigned();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('authentications');
    }
}
