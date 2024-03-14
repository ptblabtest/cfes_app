<?php

namespace App\Models;

use App\Traits\HandleModelMorph;
use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Advance extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasCreator;
    use HandleModelMorph;

    protected $fillable = [
        'advance_number', 'amount', 'description', 'model_type', 'model_id', 'created_by'
    ];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

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
        // Assuming the related model is 'Expense' and it has 'advance_id' as foreign key
        return $this->hasMany(Expense::class, 'advance_id');
    }

    // Accessor for expenses_total
    public function getExpensesTotalAttribute(): float
    {
        return $this->expenses()->sum('amount');
    }






}
