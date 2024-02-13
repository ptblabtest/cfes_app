<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TreeLoggingFinding extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'date', 'location_id', 'longitude', 'latitude', 'permit_type', 
        'name', 'quantity', 'unit', 'age_type', 'description', 'action'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Temuan Penebangan Pohon';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
