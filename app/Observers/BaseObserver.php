<?php

namespace App\Observers;

use App\Notifications\NotifLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BaseObserver
{
    public function creating($model)
    {
        if (auth()->check() && in_array('created_by', $model->getFillable())) {
            $model->created_by = auth()->id();
        }

        if (empty($model->approval_status) && in_array('approval_status', $model->getFillable())) {
            $model->approval_status = 'draft';
        }

        $this->notify($model, "created");
    }

    public function updating($model)
    {
        if (auth()->check() && $model->isDirty('approval_status') && $model->approval_status == 'Disetujui') {
            if (in_array('approved_by', $model->getFillable())) {
                $model->approved_by = auth()->id();
            }

            if (in_array('approval_date', $model->getFillable())) {
                $model->approval_date = Carbon::now();
            }
        }

        $this->notify($model, "updated");
    }

    protected function notify($model, $action)
    {
        // Assuming $model->created_by is the user you want to notify
        // Ensure your User model uses the Notifiable trait
        $user = \App\Models\User::find($model->created_by);

        if ($user) {
            $user->notify(new NotifLog($model, $action));
        }
    }
}
