<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function sells()
    {
        return $this->hasMany(Sell::class);
    }

    public function sent_messages()
    {
        return $this->hasMany(Message::class, 'from_user_id', 'id');
    }

    public function received_messages()
    {
        return $this->hasMany(Message::class, 'to_user_id', 'id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
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
}
