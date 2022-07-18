<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    
    // protected $append = ['status'];
    // public function getStatusAttribute()
    // {
    //     return $this->active ? "active" : "disable";
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $append = ['status'];

    public function getStatusAttribute()
    {
        return $this->active ? 'Active' : 'Disabled';
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'active',


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
    ];
}
