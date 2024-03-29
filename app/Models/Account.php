<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;

class Account extends Model
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithMedia;

    public $timestamps = false;

    protected $fillable = [
        'account_number', 'name', 'type'
    ];

    public function accountItems()
    {
        return $this->hasMany(AccountItem::class);
    }

    public function getCreditAttribute(): float
    {
        return $this->accountItems()->with('expenses')->get()->sum(function ($accountItem) {
            return $accountItem->expenses->sum('amount');
        });
    }
    
    protected $appends = ['credit'];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.accounts.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->is_active = true;
        });
    }
}
