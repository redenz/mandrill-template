<?php

namespace NotificationChannels\MandrillTemplate;

use Illuminate\Support\ServiceProvider;
use NotificationChannels\MandrillTemplate\MandrillTemplateChannel;
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
                $mandrillConfig = config('services.mandrill');
                return new Mail($mandrillConfig['secret']);
            });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
