<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luta extends Model
{
    use HasFactory;

    protected $fillable = [
        'campeonato_id',
        'atleta1_id',
        'atleta2_id',
        'fase'
    ];

}
