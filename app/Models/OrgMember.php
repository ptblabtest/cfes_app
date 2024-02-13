<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OrgMember extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    public $timestamps = false;

    protected $fillable = [
        'name', 'position', 'division', 'org_id', 'start_date', 'end_date'
    ];

    public function org()
    {
        return $this->belongsTo(Org::class, 'org_id');
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'List Produk LPHD / KPHA';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



}
