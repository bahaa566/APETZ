<?php


namespace App\Notifications;
use Illuminate\Notifications\Notification;


class fireBaseChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFirebase($notifiable);
    }
}

