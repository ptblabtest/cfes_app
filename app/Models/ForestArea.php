<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForestArea extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['year', 'location_id', 'util_amount', 'prot_amount', 'image'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    
}
