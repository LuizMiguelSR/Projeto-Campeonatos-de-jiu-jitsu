<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destaques extends Model
{
    use HasFactory;

    protected $table = 'destaques';

    protected $fillable = [
        'primeiro',
        'segundo',
        'terceiro',
        'quarto',
        'quinto',
        'sexto',
        'setimo',
        'oitavo',
    ];
}
