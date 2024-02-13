<?php

namespace App\Traits;

use App\Models\Approval;

trait HasApproval
{
    protected static function bootHasApproval()
    {
        static::created(function ($model) {
            Approval::create([
                'model_type' => get_class($model),
                'model_id'   => $model->getKey(),
                'status'     => 'draft',
            ]);
        });
    }
    public function approval()
    {
        return $this->hasOne(Approval::class, 'model_id')
            ->where('model_type', self::class);
    }
}
