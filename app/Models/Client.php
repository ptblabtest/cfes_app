<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use HasFactory, LogsActivity,InteractsWithMedia;

    public $timestamps = false;
    protected $fillable = ['name', 'address', 'phone', 'cp_name', 'cp_email', 'cp_phone'];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'List Klien';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }


}
