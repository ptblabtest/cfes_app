<?php

namespace App\Traits;

trait HandleModelMorph
{
    public function model()
    {
        return $this->morphTo();
    }
}
