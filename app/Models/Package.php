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
        'package_value',
        'quantity', 
        'departure',
        'destination',
        'package_type',
        'addi_infor',
        'shipping',
    ];
}
