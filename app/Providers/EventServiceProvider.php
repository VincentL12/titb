<?php

namespace App\Providers;

use App\Events\ReplyWasCreated;
use App\Events\ThreadWasCreated;
use App\Listeners\AwardPointsForCreatingReply;
use App\Listeners\AwardPointsForCreatingThread;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReplyWasCreated::class => [
            AwardPointsForCreatingReply::class,
        ],
        ThreadWasCreated::class => [
            AwardPointsForCreatingThread::class,
        ]
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
}
