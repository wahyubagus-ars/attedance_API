<?php

namespace App\Providers;

use App\Constants\Constant;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        config(['app.locale' => 'id']);
        config(['app.timezone' => 'Asia/Jakarta']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');


        $data_settings = Setting::all();
        Cache::add(Constant::SETTINGS_ATTENDANCE, $data_settings->toJson(), 60*60*24);
    }
}
