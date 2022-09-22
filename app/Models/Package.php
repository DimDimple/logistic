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
        // 'status',
        'pay_status',
        'total_fee',
        'total_item',
        // 'reference_number',
    ];

    public function goods()
    {
        return $this->hasMany(Goods::class, 'package_id', 'id');
    }
    // public function branch()
    // {
    //     return $this->hasMany(Branch::class);
    // }


    public function branch_departure(){
        return $this->hasOne(Branch::class, 'id', 'departure_id');
    }

    public function branch_destination(){
        return $this->hasOne(Branch::class, 'id', 'destination_id');
    }

}
