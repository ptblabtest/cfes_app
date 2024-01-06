<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name', 'revenue', 'ku_id', 'description', 'image', 'tokopedia_url', 'shopee_url'
    ];

    public function kulist()
    {
        return $this->belongsTo(KuList::class, 'ku_id');
    }
}
