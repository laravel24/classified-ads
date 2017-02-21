<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\ViewComposers\{AreaComposer, NavigationComposer};

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer('layouts.partials._nav', NavigationComposer::class);
        View::composer(['listings.partials.forms._categories'], function($view) {
          $categories = \App\Category::get()->toTree();
          $view->with(compact('categories'));
        });

        View::composer(['listings.partials.forms._areas'], function($view) {
          $areas = \App\Area::get()->toTree();
          $view->with(compact('areas'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }
}
