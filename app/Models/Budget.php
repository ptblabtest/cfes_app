<?php

namespace App\Models;

use App\Traits\HandleModelMorph;
use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Budget extends Model
{
    use HasFactory;
    use LogsActivity;  
    use HasCreator;
    use HandleModelMorph;

    protected $fillable = ['account_id', 'amount', 'start_date', 'end_date', 'description', 'model_id', 'model_type', 'created_by'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.budgets.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
