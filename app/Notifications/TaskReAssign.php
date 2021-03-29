<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskReAssign extends Notification
{
    use Queueable;

    public $user;
    public $task_info;
    public $title;
    public $priority;
    public $task_status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $task_info, $title, $priority, $task_status)
    {
        $this->user         = $user;
        $this->task_info    = $task_info;
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
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'user_id'       => $this->user->id,
            'user_name'     => $this->user->name,
            'task_info'     => $this->task_info,
            'title'         => $this->title,
            'priority'      => $this->priority,
            'task_status'   => $this->task_status,
        ];
    }
}
