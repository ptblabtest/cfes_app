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

class Deal extends Model implements HasMedia
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia;
    use HasCreator, HasDocument;

    protected $fillable = [
        'potential_revenue', 'expected_close_date', 'description', 'sales_status', 'lead_id', 'customer_id', 'created_by'
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
        // Example: Including a 'name' attribute from a related 'customer' model
        // Ensure there's a relationship defined in this model to 'customer'
        $customerName = $this->customer ? $this->customer->name : 'NoCustomer';
        return $this->id . '-' . $customerName;
    }
    

    protected $appends = ['combined_id'];

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
