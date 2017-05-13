<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['id_user', 'id_photo', 'rate'];

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'id_photo', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
