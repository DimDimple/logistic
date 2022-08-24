<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'province',
        'address',
    ];

    public function branches(){
        return $this->hasOne (Branch::class);
    }
}
