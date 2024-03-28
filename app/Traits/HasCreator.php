<?php

namespace App\Traits;

use App\Models\User;

trait HasCreator
{

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function bootHasCreator()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });
    }

}
