<?php

namespace App\Models;

use App\Traits\HasApproval;
use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lead extends Model implements HasMedia
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia;
    use HasCreator, HasApproval;

    protected $fillable = [
        'name', 'email', 'phone', 'product_id', 'source', 'created_by'
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getStatusAttribute()
    {
        $latestLog = $this->approvalLogs()->latest()->first();
        return $latestLog ? $latestLog->status : null;
    }

    public function getCommentAttribute()
    {
        $latestLog = $this->approvalLogs()->latest()->first();
        return $latestLog ? $latestLog->comment : null;
    }

    protected $appends = ['status', 'comment'];


    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.leads.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
