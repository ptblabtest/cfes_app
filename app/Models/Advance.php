<?php

namespace App\Models;

use App\Traits\HandleModelMorph;
use App\Traits\HasCreator;
use App\Traits\HasUniqueNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Advance extends Model
{
    use HasFactory, LogsActivity, HasCreator, HandleModelMorph, HasUniqueNumber;

    protected $fillable = [
        'advance_reg_no', 'amount', 'description', 'model_type', 'model_id', 'created_by'
    ];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getUniqueNumberConfig()
    {
        return [
            'field' => 'advance_reg_no',
            'format' => [
                'prefix' => 'PUM-',
                'size' => 4,
            ],
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.advances.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }

    protected $appends = ['expenses_total'];

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'advance_id');
    }

    public function getExpensesTotalAttribute(): float
    {
        return $this->expenses()->sum('amount');
    }

}
