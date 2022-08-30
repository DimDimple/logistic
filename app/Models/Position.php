<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable=[
        'type',
    ];

    public function employeeBranches()
    {
        return $this->hasMany(EmployeeBranch::class);
    }

}
