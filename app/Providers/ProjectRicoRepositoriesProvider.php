<?php

namespace ProjectRico\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectRicoRepositoriesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \ProjectRico\Repositories\ClientRepository::class,
            \ProjectRico\Repositories\ClientRepositoryEloquent::class            
        );
        
        $this->app->bind(
            \ProjectRico\Repositories\ProjectRepository::class,
            \ProjectRico\Repositories\ProjectRepositoryEloquent::class
        );
    }
}