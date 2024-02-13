<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UserDetail extends Model implements HasMedia
{
    use HasFactory, LogsActivity, InteractsWithMedia;

    protected $fillable = [
        'user_id', 'name', 'address', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'User Detail';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
