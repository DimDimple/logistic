<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'email',
        'phone',
        'dob',
        'pob',
        'address',
        'branch_id',
        'type_id',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function type()
    {
        return $this->belongsTo(Position::class);
    }


}
