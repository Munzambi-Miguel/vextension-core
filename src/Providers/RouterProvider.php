<?php

namespace Core\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class RouterProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //  __DIR__ . '/../routes/user.php',
        // __DIR__ . '/../routes/benefix.php',
        // __DIR__ . '/../routes/atend.php',
        // __DIR__ . '/../routes/proced.php',

        $this->loadRoutes();
    }

    /**
     * Load the application's routes.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        \Log::info(date("d-m-Y H:i:s") . " Modulo Core de routas carregado.");
        Route::middleware('web')->group(__DIR__ . '/../routes/web.php');
        Route::middleware('web')->group(__DIR__ . '/../routes/atend.php');
        Route::middleware('web')->group(__DIR__ . '/../routes/proced.php');
        Route::middleware('web')->group(__DIR__ . '/../routes/benefix.php');
        Route::middleware('web')->group(__DIR__ . '/../routes/user.php');
        Route::middleware('web')->group(__DIR__ . '/../routes/auth.php');
        Route::middleware('api')->group(__DIR__ . '/../routes/api.php');
    }
}