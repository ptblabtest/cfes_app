<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EntProduct extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    public $timestamps = false;

    protected $fillable = [
        'name', 'revenue', 'ent_id', 'description', 'tokopedia_url', 'shopee_url'
    ];

    public function entlist()
    {
        return $this->belongsTo(EntList::class, 'ent_id');
    }

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $logName = 'Produk KUPS';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
