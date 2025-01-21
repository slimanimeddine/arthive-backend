<?php

namespace App\Providers;

use App\Models\Follow;
use App\Policies\FollowPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // registering policies
        Gate::policy(Follow::class, FollowPolicy::class);

        // rate limiting
        RateLimiter::for('follow', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id),
                Limit::perDay(100)->by('day' . $request->user()->id),
            ];
        });
    }
}
