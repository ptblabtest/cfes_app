<?php

namespace App\Models;

use App\Traits\HasCreator;
use App\Traits\HasDocument;
use App\Traits\HasFinancials;
use App\Traits\HasUniqueNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Project extends Model
{
    use HasFactory, LogsActivity, HasCreator, HasFinancials, HasDocument, HasUniqueNumber;

    protected $fillable = [
        'title', 'location_id', 'product_id', 'parent_id', 'deal_id', 'amount', 'start_date', 'end_date', 'status', 'created_by', 'project_reg_no'
    ];

    public function deals()
    {
        return $this->belongsTo(Deal::class, 'deal_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function projectActivities()
    {
        return $this->hasMany(ProjectActivity::class, 'project_id');
    }

    public function getCombinedIdAttribute()
    {
        $locationName = $this->location ? $this->location->forest_name : 'NoLocation';
        return $this->project_reg_no . ' - ' . $locationName;
    }
    
    protected $appends = ['combined_id'];

    public function getUniqueNumberConfig()
    {
        return [
            'field' => 'project_reg_no',
            'format' => [
                'prefix' => 'PRO-',
                'size' => 4,
            ],
        ];
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.projects.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
