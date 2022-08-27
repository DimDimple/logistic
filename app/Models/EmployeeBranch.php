<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBranch extends Model
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
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


}
