<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'location_id', 'org_category', 'description', 'image', 'sk_number', 'file'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function orgcategory()
    {
        return $this->belongsTo(Option::class, 'org_category');
    }
    
}
