<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskCreatedEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $title;
    public $priority;
    public $task_status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $title, $priority, $task_status)
    {
        $this->user         = $user;
        $this->title        = $title;
        $this->priority     = $priority;
        $this->task_status  = $task_status;
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
        return (new MailMessage)
                    ->line('New task created by ' . $this->user->name . ' for you.')
                    ->action('Open Task MIS', url('/'))
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
