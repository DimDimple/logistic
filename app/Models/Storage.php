<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $fillable=[
       
        'package_price',
        'package_type',
        'fee',
        'message',
    ];
    
}
