<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbsencesTable extends Migration
{
    public function up()
    {
        // id int [pk, increment] // auto increment
        // user_id int [ref: > users.id] // many to one
        // doc varchar
        // absence_date date
        // description text
        // approval_status approval_status

        Schema::create('absences', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('document')->nullable();
            $table->date('absence_date');
            $table->text('description')->nullable();
            $table->enum('approval_status', ['pending', 'reject', 'approve'])->default('pending');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
