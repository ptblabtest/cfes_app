<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuStatus extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'ku_status';



    protected $fillable = [
        'ku_id', 'group_type', 'kups_class', 'sk_number', 'file'
    ];

    public function kulist()
    {
        return $this->belongsTo(KuList::class, 'ku_id');
    }

    public function grouptype()
    {
        return $this->belongsTo(Option::class, 'group_type');
    }

    public function kupsclass()
    {
        return $this->belongsTo(Option::class, 'kups_class');
    }
}
