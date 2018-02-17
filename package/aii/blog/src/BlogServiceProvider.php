<?php

namespace Aii\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //routing your web files
        include __DIR__.'/routes/web.php';

        /*Publish assets to app public directory*/
        $this->publishes([
            __DIR__ . '/public/blog' => public_path('/blog'),
        ], 'public');

        /*Publish migration to app database directory*/
        $this->publishes([
            __DIR__.'/migrations' => database_path('/migrations')
        ], 'migrations');

        /*Publish config to app config directory*/
        $this->publishes([
            __DIR__.'/config' => config_path('/')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*start::register controller*/
        $this->app->make('Aii\Blog\Controller\DashboardController');
        $this->app->make('Aii\Blog\Controller\BlogController');
        /*end::register controller*/

        /*view pages*/
        $this->loadViewsFrom(__DIR__.'/view/blog/', 'blog');
    }
}
