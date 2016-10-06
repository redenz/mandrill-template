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
                $mandrillConfig = config('broadcasting.connections.mandrill');

                return new Mail(
                    $mandrillConfig['key']
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
