<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\VehicleRepositoryInterface;
use App\Repositories\VehicleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
