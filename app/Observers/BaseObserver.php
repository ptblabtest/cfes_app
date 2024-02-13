<?php

namespace App\Observers;

class BaseObserver
{
    public function creating($model)
    {
        // Check and set 'created_by' if the model has this attribute and a user is authenticated
        if (auth()->check() && in_array('created_by', $model->getFillable())) {
            $model->created_by = auth()->id();
        }

        // Check and set 'approval_status' to 'Tunggu Persetujuan' if the model has this attribute and it's not set
        if (empty($model->approval_status) && in_array('approval_status', $model->getFillable())) {
            $model->approval_status = 'Tunggu Persetujuan';
        }
    }
}
