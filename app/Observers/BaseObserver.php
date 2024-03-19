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

        $this->notify($model, "created");
    }
}
