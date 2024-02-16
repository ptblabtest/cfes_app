<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plan extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, LogsActivity, InteractsWithMedia;

    protected $fillable = [
        'year', 'title', 'project_target', 'project_type', 'project_id', 'address', 'created_by'
    ];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function tor()
    {
        return $this->hasMany(Tor::class);
    }

    public function btor()
    {
        return $this->hasMany(Btor::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function actreports()
    {
        return $this->hasMany(ActReport::class);
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Plan';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
}
