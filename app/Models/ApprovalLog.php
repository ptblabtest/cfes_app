<?php

namespace App\Models;

use App\Traits\HandleModelMorph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalLog extends Model
{
    use HasFactory;
    use HandleModelMorph;

    protected $fillable = [
        'model_type', 'model_id', 'status', 'comment', 'log_number', 'approved_by'
    ];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

}
