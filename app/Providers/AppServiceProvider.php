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
use App\Traits\ApiResponses;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;

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
                    return $this->rateLimitExceeded('You have reached the hourly limit for following users.');
                }),
                Limit::perDay(100)->by('day' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for following users.');
                }),
            ];
        });

        RateLimiter::for('like', function (Request $request) {
            return [
                Limit::perHour(20)->by('hour' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for liking artworks.');
                }),
                Limit::perDay(200)->by('day' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for liking artworks.');
                }),
            ];
        });

        RateLimiter::for('comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for commenting on artworks.');
                }),
                Limit::perDay(100)->by('day' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for commenting on artworks.');
                }),
            ];
        });

        RateLimiter::for('update-comment', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for updating comments.');
                }),
                Limit::perDay(100)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for updating comments.');
                }),
            ];
        });

        RateLimiter::for('create-artwork', function (Request $request) {
            return [
                Limit::perDay(30)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for creating artworks.');
                }),
            ];
        });

        RateLimiter::for('upload-photos', function (Request $request) {
            return [
                Limit::perHour(30)->by('hour' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for uploading photos.');
                }),
                Limit::perDay(3000)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for uploading photos.');
                }),
            ];
        });

        RateLimiter::for('favorite', function (Request $request) {
            return [
                Limit::perHour(10)->by('hour' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for favoriting artworks.');
                }),
                Limit::perDay(50)->by('day' . $request->user()->id . $request->route('id'))->response(function () {
                    return $this->rateLimitExceeded('You have reached the daily limit for favoriting artworks.');
                }),
            ];
        });

        RateLimiter::for('email-verification-code', function (Request $request) {
            return [
                Limit::perMinute(1)->by('minute' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the minute limit for sending email verification codes.');
                }),
                Limit::perHour(10)->by('hour' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for sending email verification codes.');
                }),
            ];
        });

        RateLimiter::for('forgot-password-code', function (Request $request) {
            return [
                Limit::perMinute(1)->by('minute' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the minute limit for sending forgot password codes.');
                }),
                Limit::perHour(10)->by('hour' . $request->user()->id)->response(function () {
                    return $this->rateLimitExceeded('You have reached the hourly limit for sending forgot password codes.');
                }),
            ];
        });

        // customize the reset password notification
        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return env('FRONTEND_URL') . '/reset-password?token=' . $token;
        });
    }
}
