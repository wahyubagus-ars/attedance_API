<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{   
    public function up()
    {
                // id int [pk, increment] //auto-increment
                // name varchar
                // auth_id int [ref: > authentications.id] // one to one
                // roll_number int
                // mobile_phone varchar
                // dob date
                // address text
                // religion religion
                // gender gender
                // device_id varchar
                // os_type varchar
                // profile_img varchar
                // late_count int
                // status boolean

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('auth_id')->unsigned();
            $table->bigInteger('agency_id')->unsigned();
            $table->integer('roll_number')->nullable()->unsigned();
            $table->string('mobile_phone', 20);
            $table->date('dob')->nullable();
            $table->text('address');
            $table->enum('religion', ['islam', 'protestan', 'katholik', 'hindu', 'buddha'])->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('device_id')->nullable();
            $table->string('os_type', 25)->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('late_count')->unsigned()->nullable()->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
