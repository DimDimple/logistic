<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PType extends Model
{
    use HasFactory;
    protected $fillable=[
        'package_type',
    ];

    public function goods()
    {
        return $this->hasOne(Goods::class, 'ptype_id', 'id');
    }

}
