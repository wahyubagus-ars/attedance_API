<?php

namespace App\Providers;

use App\Constants\Constant;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\UserController;
use App\Http\Repositories\AgencyRepository;
use App\Http\Repositories\Impl\AgencyRepositoryImpl;
use App\Services\AgencyService;
use App\Services\Impl\AgencyServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        AgencyService::class => AgencyServiceImpl::class,
        AgencyRepository::class => AgencyRepositoryImpl::class
    ];

    public function register()
    {
    }

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
