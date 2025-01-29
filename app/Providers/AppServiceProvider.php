<?php

namespace App\Providers;

use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Models\ArtworkLike;
use App\Models\ArtworkPhoto;
use App\Models\Follow;
use App\Models\User;
use App\Policies\ArtworkCommentPolicy;
use App\Policies\ArtworkLikePolicy;
use App\Policies\ArtworkPhotoPolicy;
use App\Policies\ArtworkPolicy;
use App\Policies\FollowPolicy;
use App\Policies\UserPolicy;
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
        Gate::policy(ArtworkLike::class, ArtworkLikePolicy::class);
        Gate::policy(ArtworkComment::class, ArtworkCommentPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Artwork::class, ArtworkPolicy::class);
        Gate::policy(ArtworkPhoto::class, ArtworkPhotoPolicy::class);

        // rate limiting
        RateLimiter::for('follow', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id),
                Limit::perDay(100)->by('day' . $request->user()->id),
            ];
        });

        RateLimiter::for('like', function (Request $request) {
            return [
                Limit::perHour(20)->by('hour' . $request->user()->id),
                Limit::perDay(200)->by('day' . $request->user()->id),
            ];
        });

        RateLimiter::for('comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id),
                Limit::perDay(100)->by('day' . $request->user()->id),
            ];
        });

        RateLimiter::for('update-comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id . $request->route('id')),
                Limit::perDay(100)->by('day' . $request->user()->id . $request->route('id')),
            ];
        });

        RateLimiter::for('create-draft', function (Request $request) {
            return [
                Limit::perDay(30)->by('day' . $request->user()->id . $request->route('id')),
            ];
        });

        RateLimiter::for('upload-photos', function (Request $request) {
            return [
                Limit::perHour(30)->by('hour' . $request->user()->id . $request->route('id')),
                Limit::perDay(3000)->by('day' . $request->user()->id . $request->route('id')),
            ];
        });

    }
}
