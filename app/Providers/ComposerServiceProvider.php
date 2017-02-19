<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\ViewComposers\AreaComposer;

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
        View::composer(['listings.partials.forms._areas', 'listings.partials.forms._categories'], function($view) {
          $categories = \App\Category::get()->toTree();
          $areas = \App\Area::get()->toTree();

          $view->with(compact('categories', 'areas'));
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
