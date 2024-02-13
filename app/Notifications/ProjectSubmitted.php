<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectSubmitted extends Notification
{
    use Queueable;

    private $project;

    public function __construct($project)
    {
        $this->project = $project;
    }

    public function via($notifiable)
    {
        return ['mail']; // or any other channel
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new project has been created: ' . $this->project->name)
                    ->line('Thank you for using our application!');
    }
}