<?php

namespace Marrs\MarrsAdmin;

use Illuminate\Support\ServiceProvider;
use Marrs\MarrsAdmin\Http\Middleware\AdminAuth;
use Marrs\MarrsAdmin\Views\Components\Menu;

class MarrsAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'marrs-admin');

        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('marrs-admin.php')
        ], 'marrs-admin-config');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'marrs-admin');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/marrs-admin'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewComponentsAs('marrs-admin', [
            Menu::class
        ]);

        $this->publishes([
            __DIR__ . '/public' => public_path('vendor/marrs-admin'),
        ], 'marrs-admin-assets');

        $this->mergeAuthFileFrom(__DIR__ . '/config/auth.php', 'auth');
    }

    public function register()
    {
        $this->loadMiddleware();
    }

    protected function mergeAuthFileFrom($path, $key)
    {
        $original = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->multi_array_merge(require $path, $original));
    }

    protected function multi_array_merge($toMerge, $original)
    {
        $auth = [];
        foreach ($original as $key => $value) {
            if (isset($toMerge[$key])) {
                $auth[$key] = array_merge($value, $toMerge[$key]);
            } else {
                $auth[$key] = $value;
            }
        }

        return $auth;
    }

    protected function loadMiddleware()
    {
        app('router')->aliasMiddleware('admin', AdminAuth::class);
    }
}
