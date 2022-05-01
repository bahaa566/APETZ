<?php

namespace App\Notifications\Admin;

use App\Notifications\fireBaseChannel;
use App\Traits\FireBase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;

class GeneralNotification extends Notification
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [fireBaseChannel::class, 'database'];
    }


    public function toFirebase($notifiable)
    {
        $data = $this->data;
        FireBase::notification($notifiable, $data['title'], $data['en_title'], $data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->data['title'],
            'en_title' => $this->data['en_title'],
            'body' => $this->data['body'],
            'en_body' => $this->data['en_body'],
        ];

    }
}
