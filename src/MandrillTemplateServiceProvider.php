<?php

namespace NotificationChannels\MandrillTemplate;

use Illuminate\Support\ServiceProvider;
use Weblee\Mandrill\Mail;

class MandrillTemplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Bootstrap code here.

        $this->app->when(MandrillTemplateChannel::class)
            ->needs(Mail::class)
            ->give(function () {
                $mandrillConfig = config('broadcasting.connections.pusher');

                return new Pusher(
                    $pusherConfig['key'],
                    $pusherConfig['secret'],
                    $pusherConfig['app_id']
                );
            });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
