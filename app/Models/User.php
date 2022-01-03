<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'contacto_movel' ,
        'ocupacao_profissional' ,
        'ocupacao_profissional_ing' ,
        'linkedin' ,
        'fotografia' ,
        'motivo',
        'validacao',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'validacao',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function interesses(){
        return $this->belongsToMany(AreaInteresse::class, 'utilizador_interesse', 'id_utilizador', 'id_interesse');
    }

    public function mentorias(){
        return $this->belongsToMany(Mentoria::class, 'utilizador_mentoria', 'id_mentorando','id_mentoria');
    }

    public function ment(){
        return $this->hasMany(Mentoria::class,'id_mentor','id');
    }

    
}
