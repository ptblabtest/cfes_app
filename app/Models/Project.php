<?php

namespace App\Models;

use App\Notifications\ProjectSubmitted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, LogsActivity, InteractsWithMedia;

    protected $fillable = [
        'title', 'client_id', 'location_id', 'sales_type', 'amount', 'approval_status', 'pmanager', 'approver', 'start_date', 'end_date', 'created_by'
    ];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function docs()
    {
        return $this->hasMany(Doc::class, 'project_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function pmanager()
    {
        return $this->belongsTo(User::class, 'pmanager');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver');
    }


    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Project';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


}
