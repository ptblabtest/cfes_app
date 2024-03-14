<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotifLog extends Notification
{
    use Queueable;

    private $model;
    private $action;

    public function __construct($model, $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['database']; 
    }

    public function toDatabase($notifiable)
    {
        return [
            'model_id' => $this->model->id,
            'action' => $this->action,
        ];
    }
}