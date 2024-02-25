<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Observers\BlogsSubscribe;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
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

         //Blog::observe(BlogsSubscribe::class);


         View::share('servicesFooter', Service::limit(6)->get());
        // View::share('projects', Project::limit(6)->get());
    }
}
