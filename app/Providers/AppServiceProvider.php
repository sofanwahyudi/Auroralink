<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Post;

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
        view()->composer('frontend.popular', function($view){
            $popularPosts = Post::published()->popular()->take(3)->get();
//            $posts = $popularPosts->popular()->take(3)->get();
        //    dd($popularPosts);
            return $view->with('popularPosts', $popularPosts);
        });
    }
}
