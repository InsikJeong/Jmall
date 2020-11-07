<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Articles(){
        //many쪽 관계라서 복수형
        return $this->hasMany(Articles::class);
        // this(사용자)는 많은  가지고 있다.
    }

    public function Comments(){
        //many쪽 관계라서 복수형
        return $this->hasMany(Comments::class);
        // this(사용자)는 많은  가지고 있다.
    }
}
