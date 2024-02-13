<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Org extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    public $timestamps = false;

    protected $fillable = [
        'name', 'location_id', 'org_type', 'description','sk_number'
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
    protected static $logName = 'List LPHD / KPHA';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
}
