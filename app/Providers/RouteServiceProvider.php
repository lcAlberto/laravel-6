<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        $this->mapUnauthenticatedWebRoutes();
        $this->mapAuthenticatedWebRoutes();
        $this->mapPaginationRoutes();
    }

    protected function mapUnauthenticatedWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/unauthenticated.php'));
    }

    protected function mapAuthenticatedWebRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/authenticated.php'));
    }

    protected function mapPaginationRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->prefix('pagination')
            ->group(base_path('routes/web/pagination.php'));
    }

    protected function mapApiRoutes()
    {
        $this->mapApiV1Routes();
    }

    protected function mapApiV1Routes()
    {
        $namespace = $this->namespace . '\Api\v1';

        Route::prefix('api/v1')
            ->middleware('api')
            ->middleware('auth:api')
            ->namespace($namespace)
            ->group(base_path('routes/api/v1/authenticated.php'));

        Route::prefix('api/v1')
            ->middleware('api')
            ->namespace($namespace)
            ->group(base_path('routes/api/v1/unauthenticated.php'));
    }
}