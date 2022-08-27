<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $fillable=[
       
        'package_price',
        'quantity', 
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


}
