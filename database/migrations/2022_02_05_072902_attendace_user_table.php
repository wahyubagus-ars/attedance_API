<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttendaceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_user', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('attendance_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->dateTime('submit_attedance_time')->nullable();
            $table->date('attedance_date')->nullable();
            $table->string('location', 100)->nullable();
            $table->string('photo')->nullable();
            $table->boolean('result')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
