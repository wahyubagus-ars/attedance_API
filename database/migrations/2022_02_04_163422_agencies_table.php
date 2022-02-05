<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgenciesTable extends Migration
{
    public function up()
    {
        // id int [pk, increment] // auto increment
        // agency_name varchar
        // email varchar
        // phone_number varchar
        // phone_number_2 varchar
        // owner varchar
        // address varchar
        // since date
        // status boolean

        Schema::create('agencies', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('auth_id')->unsigned();
            $table->string('agency_name', 100);
            $table->string('email', 50)->unique();
            $table->string('phone_number', 20);
            $table->string('phone_number_2', 20)->nullable();
            $table->date('since')->nullable();
            $table->text('address')->nullable();
            $table->string('owner', 100)->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}
