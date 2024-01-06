<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Btor extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'tor_id', 'start_date', 'end_date', 'location_id', 'description', 'sch_detail',
        'followup', 'image', 'file', 'cost'
    ];


    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function tor()
    {
        return $this->belongsTo(Tor::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
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

        static::creating(function ($btor) {
            if (auth()->check()) {
                $btor->created_by = auth()->id();
            }
            $btor->project_status = 'Draft';
        });
    }
}
