<?php

namespace Pcplus\LaraPermissionPakg;

use Illuminate\Support\ServiceProvider;
use Pcplus\LaraPermissionPakg\commands\test;

class LaraPermissionPakgServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->offerPublishes();

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/database');

        $this->loadCommands();
    }

    public function offerPublishes()
    {
        $this->publishes([
            __DIR__.'/database/' => database_path('migrations')
        ], 'laraPermission-migrations');

        $this->publishes([
            __DIR__.'/config/laraPermission.php' => config_path('laraPermission.php')
        ], 'laraPermission-config');
    }

    public function register()
    {
        // $this->mergeConfigFrom(
        //     __DIR__.'/config/laraPermission.php', 'otherConfigFile'
        // );
    }

    public function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                test::class,
            ]);
        }
    }
}
