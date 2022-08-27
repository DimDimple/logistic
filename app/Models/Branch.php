<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'b_name',
        'user_id',
        'location_id',
        'status',
        // 'user_id'

    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employee_branches()
    {
        return $this->hasMany(EmployeeBranch::class);
    }
}
