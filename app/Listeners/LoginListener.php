<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->update([
            'last_login_time'=>now(),
            'last_login_ip'=>request()->getClientIp(),
            'user_browser'=>request()->get_browser,
            'user_operating_system'=>request()->server('HTTP_USER_AGENT'),
            'user_location'=>request()->timezone_location_get

        ]);
    }
}
