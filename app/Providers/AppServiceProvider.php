<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $policies = [
        Post::class => PostPolicy::class
    ];

    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categorias = Category::all();
        view()->share("categories", $categorias);

        Gate::define("isAdmin", function (User $user) {
            return $user->is_admin === true;
        });

        Paginator::useBootstrapFive();

    }
}
