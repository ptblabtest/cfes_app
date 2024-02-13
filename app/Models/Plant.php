<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    public $timestamps = false;
    protected $fillable = [
        'name', 'species_name', 'description', 'iucn_id', 'cites_id', 'usage'
    ];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Tumbuhan';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


}
