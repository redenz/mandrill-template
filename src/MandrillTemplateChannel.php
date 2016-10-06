<?php

namespace NotificationChannels\MandrillTemplate;

use Illuminate\Notifications\Notification;
use Log;
use NotificationChannels\MandrillTemplate\Exceptions\CouldNotSendNotification;
use Weblee\Mandrill\Mail;

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
        if (!$notification->template) {
            Log::info("Not sending Mandrill email template not defined");
            throw new \Exception("Mandrill template name is required");
        }
        $message = [
            'to' => [
                [
                    'email' => $notifiable->email,
                    'name' => $notifiable->displayName,
                    'type' => 'to',
                ],
            ],
            'global_merge_vars' => [$notifiable->data],
        ];
        $response = $this->mandrill->messages()->sendTemplate($notification->template, [], $message, false);
        Log::info("Response", [$response]);
    }
}
