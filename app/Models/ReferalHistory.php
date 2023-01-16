<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'referal_id',
        'referred_id',
        'status',
        'is_verified',
    ];
}
