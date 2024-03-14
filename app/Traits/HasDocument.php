<?php

namespace App\Traits;

trait HasDocument
{
    public function documents()
    {
        return $this->morphMany('App\Models\Document', 'model');
    }

}
