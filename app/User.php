<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'name', 'surname',
        'address', 'post_code', 'city',
        'password',
    ];

    protected $guarded = ['remember_token'];

    protected $hidden = ['remember_token', 'password'];

    public function rates()
    {
        return $this->hasMany(Rate::class, 'id_user', 'id');
    }
}
