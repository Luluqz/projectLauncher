<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('layouts.app', function($view) {
            $default_categories = DB::table('projects_categories')->get();
            $view->with('default_categories', $default_categories);
        });
    }

    public function register()
    {
        //
    }
}

?>