<?php

namespace App\Traits;

use App\Models\ApprovalLog;

trait HasApproval
{
    public function approvalLogs()
    {
        return $this->morphMany(ApprovalLog::class, 'model');
    }
}
