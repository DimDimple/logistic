<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable=[
        'sender_phone',
        'receiver_phone',
        'departure_id',
        'destination_id',
        'status',
        'pay_status',
        'sender_email',
        'receiver_email',
        'reference_number',
        'package_price',
        'ptype_id',
        'delivery_charge',
        'product_description',
        'special_instruction',
        'weight',



    ];

    public function ptype()
    {
        return $this->belongsTo(PType::class);
    }

    public function branch_departure(){
        return $this->hasOne(Branch::class, 'id', 'departure_id');
    }

    public function branch_destination(){
        return $this->hasOne(Branch::class, 'id', 'destination_id');
    }

    
}
