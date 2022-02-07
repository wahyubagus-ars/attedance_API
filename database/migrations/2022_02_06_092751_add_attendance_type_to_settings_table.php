<?php

use App\Constants\Constant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttendanceTypeToSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('attendance_type')->default(Constant::ARRIVE);
            $table->string('arrive_time')->nullable();
            $table->string('leave_time')->nullable();
            $table->string('generate_per')->nullable()->default(Constant::DAILY);
        });

        Schema::table('attedances', function(Blueprint $table){
            $table->string('attendance_type')->default(Constant::ARRIVE);
            $table->string('percent', 10)->nullable();
            $table->dateTime('arrive_time')->nullable();
            $table->dateTime('leave_time')->nullable();
            $table->boolean('active')->nullable()->default(false);
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('attendance_type');
            $table->dropColumn('arrive_time');
            $table->dropColumn('leave_time');
            $table->dropColumn('generate_per');
        });

        Schema::table('attedances', function(Blueprint $table){
            $table->dropColumn('attendance_type');
            $table->dropColumn('percent');
            $table->dropColumn('arrive_time');
            $table->dropColumn('leave_time');
            $table->dropColumn('active');
        });
    }
}
