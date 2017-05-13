<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'id_user'];

    public function scopeByOwner($query, $ownerID)
    {
        return $query->where('id_user', $ownerID);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'id_category', 'id');
    }

    public function getPhotoNum()
    {
        return count($this->photos()->get());
    }
}
