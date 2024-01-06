<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['year', 'location_id', 'male_population', 'female_population'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
