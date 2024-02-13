<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BoundaryFinding extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'date', 'location_id', 'longitude', 'latitude', 'name', 
        'marker_number', 'description'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl();
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Sarpras';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



}
