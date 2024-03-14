<?php

namespace App\Traits;

use App\Models\User;

trait HasCreator
{

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                if (in_array('created_by', $model->getFillable())) {
                    $model->created_by = auth()->id();
                }
            }
        });
    }
}
