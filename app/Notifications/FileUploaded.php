<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FileUploaded extends Notification
{
    use Queueable;

    protected $contribution;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contribution)
    {
        //
        $this->contribution = $contribution;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/contributions/'.$this->contribution->id);
        return (new MailMessage)
                    ->line('A File has been uploaded. Click the link below to view and comment on it. Please note that you have to add a comment before 14 days')
                    ->action('View upload', url($url))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
