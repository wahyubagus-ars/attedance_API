<?php

namespace App\Console;

use App\Attendance;
use App\Constants\Constant;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        $cache = Cache::get(Constant::SETTINGS_ATTENDANCE);

        $data_settings = json_decode($cache);

        foreach ($data_settings as $key => $value) {
            if ($data_settings[$key]->generate_per == Constant::DAILY) {
                $schedule->call(function() use ($value){
                    $date_string = Carbon::now()->toDateString();
                    Attendance::create([
                        'agency_id' => $value->agency_id,
                        'attendance_date' => Carbon::parse($date_string),
                        'status' => true,
                        'attendance_type' => $value->attendance->type,
                        'percent' => '0%',
                        'arrive_time' => Carbon::parse($date_string." ".$value->arrive_time),
                        'leave_time' => Carbon::parse($date_string." ".$value->leave_time),
                        'active' => true
                    ]);
                })
                ->timezone('Asia/Jakarta')
                ->daily();
            } else if ($data_settings[$key]->generate_per == Constant::HOURLY){
                $schedule->call(function() use ($value){
                    $date_string = Carbon::now()->toDateString();
                    Attendance::create([
                        'agency_id' => $value->agency_id,
                        'attendance_date' => Carbon::parse($date_string),
                        'status' => true,
                        'attendance_type' => $value->attendance->type,
                        'percent' => '0%',
                        'arrive_time' => Carbon::parse($date_string." ".$value->arrive_time),
                        'leave_time' => Carbon::parse($date_string." ".$value->leave_time),
                        'active' => true
                    ]);
                })
                ->timezone('Asia/Jakarta')
                ->hourly()
                ->between(str_split($value->arrive_time, 5), str_split($value->leave_time, 5));
            }
        }
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
