<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantedTree extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['year', 'location_id', 'quantity', 'description'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
