<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tor extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title','project_type','start_date', 'end_date', 'location_id', 'background',
        'purpose', 'output', 'result', 'activity', 'budget'
    ];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function projecttype()
    {
        return $this->belongsTo(Option::class, 'project_type');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function btor()
    {
        return $this->hasOne(Btor::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Log all changes
    protected static $logFillable = true;

    // Only the changed attributes will be saved in the log
    protected static $logOnlyDirty = true;

    // Optionally give a name to the log
    protected static $logName = 'tor';


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tor) {
            if (auth()->check()) {
                $tor->created_by = auth()->id();
            }
            $tor->project_status = 'Draft';
        });


    }
}
