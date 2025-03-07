<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationToEmail extends Notification
{
    use Queueable;

    protected $employer;

    /**
     * Create a new notification instance.
     */
    public function __construct($employer)
    {
        $this->employer = $employer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your account has been created')
            ->greeting('Hello, ' . $this->employer->name)
            ->line('Your account has been created.')
            ->line('Email : ' . $this->employer->email .' / PassWord : 123456789')
            ->action('Login : ', url('http://127.0.0.1:8000/login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
