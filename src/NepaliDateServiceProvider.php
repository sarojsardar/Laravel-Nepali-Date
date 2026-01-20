<?php

namespace SarojSardar\LaravelNepaliDate;

use Illuminate\Support\ServiceProvider;

class NepaliDateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('nepali-date', function () {
            return new NepaliDate();
        });
    }

    public function boot()
    {
        //
    }
}