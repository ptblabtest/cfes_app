<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name', 'species_name', 'description', 'image', 'iucn_id', 'cites_id'
    ];

    public function iucn()
    {
        return $this->belongsTo(Option::class, 'iucn_id', 'id');
    }

    public function cites()
    {
        return $this->belongsTo(Option::class, 'cites_id', 'id');
    }
}
