<?php

namespace App\Providers;

use App\Models\ArtistVerificationRequest;
use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Models\ArtworkPhoto;
use App\Models\User;
use App\Policies\ArtistVerificationRequestPolicy;
use App\Policies\ArtworkCommentPolicy;
use App\Policies\ArtworkPhotoPolicy;
use App\Policies\ArtworkPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Traits\ApiResponses;

class AppServiceProvider extends ServiceProvider
{
    use ApiResponses;
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
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(ArtworkComment::class, ArtworkCommentPolicy::class);
        Gate::policy(Artwork::class, ArtworkPolicy::class);
        Gate::policy(ArtworkPhoto::class, ArtworkPhotoPolicy::class);
        Gate::policy(ArtistVerificationRequest::class, ArtistVerificationRequestPolicy::class);

        // rate limiting
        RateLimiter::for('follow', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the hourly limit for following users.', 429);
                }),
                Limit::perDay(100)->by('day' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the daily limit for following users.', 429);
                }),
            ];
        });

        RateLimiter::for('like', function (Request $request) {
            return [
                Limit::perHour(20)->by('hour' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the hourly limit for liking artworks.', 429);
                }),
                Limit::perDay(200)->by('day' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the daily limit for liking artworks.', 429);
                }),
            ];
        });

        RateLimiter::for('comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the hourly limit for commenting on artworks.', 429);
                }),
                Limit::perDay(100)->by('day' . $request->user()->id)->response(function () {
                    return $this->error('You have reached the daily limit for commenting on artworks.', 429);
                }),
            ];
        });

        RateLimiter::for('update-comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->error('You have reached the hourly limit for updating comments.', 429);
                }),
                Limit::perDay(100)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->error('You have reached the daily limit for updating comments.', 429);
                }),
            ];
        });

        RateLimiter::for('create-artwork', function (Request $request) {
            return [
                Limit::perDay(30)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->error('You have reached the daily limit for creating artworks.', 429);
                }),
            ];
        });

        RateLimiter::for('upload-photos', function (Request $request) {
            return [
                Limit::perHour(30)->by('hour' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->error('You have reached the hourly limit for uploading photos.', 429);
                }),
                Limit::perDay(3000)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->error('You have reached the daily limit for uploading photos.', 429);
                }),
            ];
        });
    }
}
