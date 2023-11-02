<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\RedefinirSenhaNootification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Atleta extends Authenticatable implements CanResetPasswordContract
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, CanResetPassword;

    protected $table = 'atletas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'sexo',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenhaNootification($token, $this->email, $this->nome));
    }

}
