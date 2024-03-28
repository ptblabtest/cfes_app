<?php

namespace App\Models;

use App\Traits\HasCreator;
use App\Traits\HasDocument;
use App\Traits\HasUniqueNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Deal extends Model implements HasMedia
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia;
    use HasCreator, HasDocument, HasUniqueNumber;

    protected $fillable = [
        'sales_reg_no', 'potential_revenue', 'expected_close_date', 'description', 'lead_id', 'customer_id', 'created_by', 
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function salesActivities()
    {
        return $this->hasMany(SalesActivity::class, 'deal_id');
    }

    public function getCombinedIdAttribute()
    {
        $customerName = $this->customer ? $this->customer->name : 'NoCustomer';
        return $this->sales_reg_no . ' - ' . $customerName;
    }
    
    protected $appends = ['combined_id'];

    public function getUniqueNumberConfig()
    {
        return [
            'field' => 'sales_reg_no',
            'format' => [
                'prefix' => 'DLS-',
                'size' => 4,
            ],
        ];
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.deals.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
