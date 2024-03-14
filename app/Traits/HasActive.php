<?php

namespace App\Traits;

trait HasActive
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->is_active = true;
        });
    }
}
