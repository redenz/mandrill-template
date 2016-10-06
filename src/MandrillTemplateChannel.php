<?php

namespace NotificationChannels\MandrillTemplate;

use Illuminate\Notifications\Notification;
use NotificationChannels\MandrillTemplate\Exceptions\CouldNotSendNotification;

class MandrillTemplateChannel
{
    private $mandrill;
    public function __construct(Mail $mandrill)
    {
        $this->mandrill = $mandrill;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\:channel_namespace\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        Log::info("Mandrill is ", [$mandrill, $notifiable, $notification]);
    }
}
