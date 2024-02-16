<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tor extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, LogsActivity, InteractsWithMedia;

    protected $fillable = [
        'plan_id', 'start_date', 'end_date', 'budget', 'created_by', 'approval_status'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'TOR';

}
