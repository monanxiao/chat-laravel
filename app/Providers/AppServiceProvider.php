<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ChatInfoObserver;
use App\Models\ChatInfo;

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
        ChatInfo::observe(ChatInfoObserver::class);// 注册观察器
    }
}
