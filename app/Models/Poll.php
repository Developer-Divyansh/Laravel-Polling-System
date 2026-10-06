<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'op1',
        'op2',
        'op3',
        'op4',        
        'start_dt',
        'end_dt',
    ];
}
