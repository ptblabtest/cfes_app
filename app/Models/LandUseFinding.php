<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LandUseFinding extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'date', 'location_id', 'longitude', 'latitude', 'name', 
        'quantity', 'description', 'action'
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
    protected static $logName = 'Temuan Pemanfaatan Lahan';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


}
