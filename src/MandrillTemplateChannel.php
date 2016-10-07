<?php

namespace NotificationChannels\MandrillTemplate;

use Illuminate\Notifications\Notification;
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
        $message = $notification->toMandrillTemplate($notifiable)->toArray();

        if (!$message['template']) {
            throw new \Exception("Mandrill template name is required");
        }

        $formData = collect($message['data'])->map(function ($item, $key) {
            return ['name' => $key, 'content' => $item];
        })->values()->toArray();

        $data = array(
            'to' => array(
                array(
                    'email' => $notifiable->email,
                    'name' => $notifiable->displayName,
                    'type' => 'to',
                ),
            ),
            'merge' => true,
            'global_merge_vars' => $formData,
        );

        $response = $this->mandrill->messages()->sendTemplate($message['template'], [], $data, false);
    }
}
