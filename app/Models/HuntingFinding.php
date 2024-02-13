<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HuntingFinding extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'date', 'location_id', 'longitude', 'latitude', 'animal_id', 
        'animal_quantity', 'tool_name', 'tool_quantity','age_type' , 'description'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Temuan Perburuan';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



}
