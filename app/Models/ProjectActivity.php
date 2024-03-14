<?php

namespace App\Models;

use App\Traits\HasCreator;
use App\Traits\HasDocument;
use App\Traits\HasFinancials;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProjectActivity extends Model implements HasMedia
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia; 
    use HasCreator, HasFinancials, HasDocument;

    protected $fillable = [
        'project_type', 'notes', 'date', 'project_id', 'created_by'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.projectactivities.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}