<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewTransactionNotification extends Notification
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // disimpan di DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message
        ];
    }
}
