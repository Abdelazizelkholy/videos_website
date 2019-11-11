<?php

namespace App\Providers;

use App\Models\Category;

use App\Models\Skill;

use App\Models\Page;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        view()->share('categories' , Category::get());
        view()->share('skills' , Skill::get());
        view()->share('pages' , Page::get());
    }

}
