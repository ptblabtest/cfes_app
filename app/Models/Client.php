<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = false;
    protected $fillable = ['name', 'address', 'phone'];

    public function clientcontact (){
        return $this->hasMany(ClientContact::class,'client_id');

    }

    public function getImageUrlAttribute()
    {
        // Use 'default' as the collection name
        return $this->getFirstMediaUrl();
    }

    
}
