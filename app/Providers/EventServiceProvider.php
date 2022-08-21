<?php

namespace App\Providers;

use App\Models\Artist;
use App\Models\Contact;
use App\Models\Exhibition;
use App\Models\Post;
use App\Observers\ArtistObserver;
use App\Observers\ContactObserver;
use App\Observers\ExhibitionObserver;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\User;
use App\Observers\UserObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        User::class => [UserObserver::class],
        Post::class => [PostObserver::class],
        Exhibition::class => [ExhibitionObserver::class],
        Artist::class => [ArtistObserver::class],
        Contact::class => [ContactObserver::class],
    ];

    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
