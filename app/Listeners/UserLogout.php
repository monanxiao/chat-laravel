<?php

namespace App\Listeners;

use App\Events\UserLogoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLogoutEvent  $event
     * @return void
     */
    public function handle(UserLogoutEvent $event)
    {
        //
    }
}
