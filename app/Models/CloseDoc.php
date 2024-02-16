<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CloseDoc extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;


    protected $table = 'closedocs';
    protected $fillable = [
        'project_id','created_by'
    ];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Dokumen ISO';
}
