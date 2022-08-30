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
        
    ];

    public function goods()
    {
        return $this->hasMany(Goods::class);
    }
    // public function branch()
    // {
    //     return $this->hasMany(Branch::class);
    // }

}
