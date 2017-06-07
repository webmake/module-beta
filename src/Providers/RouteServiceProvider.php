<?php

namespace ModuleBeta\Beta\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 * @package ModuleBeta\Beta\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $namespace = 'ModuleBeta\Beta\Http\Controllers';

    /**
     * Define the routes for the application.
     * @return void
     */
    public function map()
    {
        if (!app()->routesAreCached()) {
            $this->mapApiRoutes();
        }
    }

    /**
     * @return void
     */
    private function mapApiRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group($this->modulePath('routes/api.php'));
    }

    /**
     * @param string $path
     * @return string
     */
    private function modulePath($path)
    {
        return __DIR__ . '/../' . $path;
    }
}
