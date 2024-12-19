<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use TusPhp\Tus\Server as TusServer;

class TusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        //
        $this->app->singleton('tus-server', function ($app) {
            $server = new TusServer('file');

            $server->setApiPath('/tus');
            $server->setUploadDir(  storage_path   ('app/public/uploads'));

            return $server;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
