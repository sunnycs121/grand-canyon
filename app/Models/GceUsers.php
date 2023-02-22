<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GceUsers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'employee_id'
    ];

    public $timestamps = false;
}
