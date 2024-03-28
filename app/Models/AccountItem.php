<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class AccountItem extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = ['account_id', 'name', 'description'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'account_item_id');
    }
    
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        $logName = config('pages.documents.accountitems', 'default');

        return LogOptions::defaults()
            ->logOnlyDirty()
            ->useLogName($logName)
            ->logFillable();
    }







}
