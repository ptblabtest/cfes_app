<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuList extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'location_id', 'year', 'description', 'image'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
