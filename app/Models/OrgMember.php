<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgMember extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'position', 'division', 'org_id', 'start_date', 'finish_date', 'active_status', 'image'
    ];

    public function org()
    {
        return $this->belongsTo(OrgList::class, 'org_id');
    }

    public function activestatus()
    {
        return $this->belongsTo(Option::class, 'active_status');
    }
}
