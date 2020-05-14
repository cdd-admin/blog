<?php

namespace App\Modules\Frontend\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('frontend', 'Resources/Lang', 'app'), 'frontend');
        $this->loadViewsFrom(module_path('frontend', 'Resources/Views', 'app'), 'frontend');
        $this->loadMigrationsFrom(module_path('frontend', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('frontend', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('frontend', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
