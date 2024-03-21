<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Location extends Model implements HasMedia
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia;

    public $timestamps = false;
    protected $fillable =
    [
        'forest_name', 'village_name', 'address', 'city_name', 'province_name', 'forest_category'
    ];

    public function project()
    {
        return $this->hasMany(Project::class, 'location_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.locations.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
