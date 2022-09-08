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
        'total_fee',
        'total_item',
        'reference_number',
    ];

    public function goods()
    {
        return $this->hasMany(Goods::class);
    }
    // public function branch()
    // {
    //     return $this->hasMany(Branch::class);
    // }

    public function province_departure(){
        return $this->hasOne(Location::class, 'id', 'departure_id');
    }

    public function province_destination(){
        return $this->hasOne(Location::class, 'id', 'destination_id');
    }

}
