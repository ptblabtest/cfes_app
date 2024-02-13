<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EntList extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    public $timestamps = false;
    protected $fillable = ['name', 'location_id', 'year', 'description', 'ent_type', 'kups_class', 'sk_number'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'List KUPS';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
