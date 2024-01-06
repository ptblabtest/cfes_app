<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone', 'client_id'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }


}
