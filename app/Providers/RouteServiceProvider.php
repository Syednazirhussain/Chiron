<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->webRoutes();
            $this->apiRoutes();
            $this->adminRoutes();
            $this->trainerRoutes();
            $this->traineeRoutes();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */

    protected function webRoutes()
    {
        Route::middleware(['web','prevent-back-history'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

    }

    protected function apiRoutes()
    {
        Route::prefix('api')
            ->middleware(['api', 'auth','prevent-back-history'])
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

//Route::prefix('api/v1')
//->middleware('api')
//->as('api.')
//->namespace($this->app->getNamespace().'Http\Controllers\API')
//->group(base_path('routes/api.php'));



    protected function adminRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth','admin.auth','IsAdmin','prevent-back-history'])
            ->namespace($this->app->getNamespace().'Http\Controllers\Admin')
            ->group(base_path('routes/admin.php'));

    }

    protected function trainerRoutes()
    {
        Route::prefix('trainer')
            ->middleware(['web', 'auth','IsTrainer','prevent-back-history'])
            ->namespace($this->namespace . "\Trainer")
            ->group(base_path('routes/trainer.php'));
    }

    protected function traineeRoutes()
    {
        Route::prefix('trainee')
            ->middleware(['web', 'auth','IsTrainee','prevent-back-history'])
            ->namespace($this->namespace . "\Trainee")
            ->group(base_path('routes/trainee.php'));
    }


    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
