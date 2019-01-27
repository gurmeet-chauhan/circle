<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'gender', 'bio', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses() {
        return $this->hasMany(Status::class, 'owner_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function chatsAsInitiator()
    {
        return $this->hasOne(Chat::class, 'initiator_id');
    }

    public function chatsAsRecipient()
    {
        return $this->hasOne(Chat::class, 'recipient_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
