<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $fillable=[

        'package_price',
<<<<<<< HEAD
        'quantity',
=======
>>>>>>> 058ccd29a0ceaa9388568f2f8ee83e43b7f0496c
        'ptype_id',
        'fee',
        'message',
        'package_id'

    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function ptype()
    {
        return $this->belongsTo(PType::class);
    }

    // public function getTransactionDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('m/d/Y');
    // }
}
