<?php

namespace Admins\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        $module_name = basename(dirname(__DIR__,1));

        //to use config file
        config([
            $module_name=>File::getRequire(loadConfigFile($module_name, 'route'))
        ]);
        //to use routes
        $this->loadRoutesFrom(loadRoutesFile($module_name, 'web'));
        //to use views
        $this->loadViewsFrom(loadViewsFile($module_name), $module_name);
        //to use translation
        $this->loadTranslationsFrom(loadTranslationFile($module_name), $module_name);
        //to use migration
        $this->loadMigrationsFrom(loadMigrationsFile($module_name));
    }
}
