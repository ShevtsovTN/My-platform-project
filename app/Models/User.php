<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function settings()
    {
        /*$relations = [
            '0' => Admin::class,
            '1' => SuperAgent::class,
            '2' => Agent::class,
            '3' => Diller::class,
            '4' => Hall::class,
            '5' => Terminal::class,
            '6' => SubAgent::class,
            '8' => SubHall::class,
            '7' => SubDiller::class
        ];
        $class = $relations[Auth::user()->group];
        return $this->hasOne($class, 'id');*/
        return $this->morphTo();
    }
}
