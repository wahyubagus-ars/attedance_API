<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttedancesTable extends Migration
{
    public function up()
    {
        //     id int [pk, increment] // auto increment
        //     attedance_date date
        //     submit_attedance datetime
        //     location varchar
        //     result boolean
        //     user_id int [ref: > users.id] // many to one
        //     status boolean

        Schema::create('attedances', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->dateTime('submit_attedance_time');
            $table->date('attedance_date');
            $table->string('location', 100);
            $table->boolean('result')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attedances');
    }
}
