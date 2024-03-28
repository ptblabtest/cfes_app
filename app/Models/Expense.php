<?php

namespace App\Models;

use App\Traits\HandleModelMorph;
use App\Traits\HasCreator;
use App\Traits\HasUniqueNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Expense extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasCreator;
    use HandleModelMorph;
    use HasUniqueNumber;
    
    protected $fillable = ['account_item_id', 'amount' ,'date', 'description', 'model_type', 'model_id', 'advance_id', 'created_by', 'expense_reg_no'];

    public function accountitem()
    {
        return $this->belongsTo(AccountItem::class, 'account_item_id');
    }

    public function advance()
    {
        return $this->belongsTo(Advance::class, 'advance_id');
    }

    public function getUniqueNumberConfig()
    {
        return [
            'field' => 'expense_reg_no',
            'format' => [
                'prefix' => 'EX-',
                'size' => 4,
            ],
        ];
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.expense.title', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }
}
