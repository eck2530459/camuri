<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'cargo',
        'email',
        'departamento_id',
        'password',
    ];
    static $rules = [	
        'name' => ['required', 'string', 'max:50'],
        'last_name' => ['required', 'string', 'max:50'],
        'cargo' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!.*$#%]).*$/', 
        'string', 'min:8',  'confirmed'],      
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id'); 
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id'); 
    }
}
