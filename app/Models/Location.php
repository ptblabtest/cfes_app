<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'forest_name',
        'village_name',
        'forest_category',
    ];

    public function forestcategory()
    {
        return $this->belongsTo(Option::class, 'forest_category', 'id');
    }
    
}
