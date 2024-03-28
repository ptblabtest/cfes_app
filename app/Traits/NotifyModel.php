<?php

namespace App\Traits;

use App\Models\User;
use App\Notifications\NotifLog;

trait NotifyModel
{
    public static function bootNotifyModel()
    {
        static::created(function ($model) {
            static::notifyAllUsers($model, 'created');
        });
    
        static::updated(function ($model) {
            static::notifyAllUsers($model, 'updated');
        });
    }
    
    protected static function notifyAllUsers($model, $event)
    {
        $users = User::all(); // Get all users. Consider using chunk() for large datasets

        foreach ($users as $user) {
            // You might want to dispatch this job to a queue for better performance
            $user->notify(new NotifLog($model, $event));
        }
    }


}