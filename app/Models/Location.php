<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Location extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, LogsActivity;

    public $timestamps = false;
    protected $fillable =
    [
        'forest_name', 'village_name', 'longitude', 'latitude', 'forest_legal', 'usable_area', 'usable_forest_area', 'protected_area', 'tree_count', 'carbon_stock', 'village_area', 'male_population', 'female_population'
    ];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Lokasi';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
