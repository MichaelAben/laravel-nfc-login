<?php

namespace MabenDev\NFCLogin;

use Illuminate\Support\ServiceProvider;
use MabenDev\NFCLogin\Middleware\CheckNFCLogin;

/**
 * Class PermissionProvider
 * @package MabenDev\Permissions
 *
 * @author Michael Aben
 */
class NFCLoginProvider extends ServiceProvider
{
    /**
     *
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/MabenDevNFCLoginConfig.php', 'MabenDevNFCLogin');
    }

    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/MabenDevNFCLoginConfig.php' => config_path('MabenDevNFCLogin.php'),
        ], 'config');

        $this->loadMigrationsFrom( __DIR__.'/Migrations/');

        $this->app['router']->aliasMiddleware('CheckNFCLogin', CheckNFCLogin::class);
    }
}
