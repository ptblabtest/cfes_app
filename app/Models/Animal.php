<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Animal extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    public $timestamps = false;
    protected $fillable = [
        'name', 'species_name', 'description', 'iucn_id', 'cites_id'
    ];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Satwa';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
