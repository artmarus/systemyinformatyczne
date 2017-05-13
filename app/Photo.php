<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['id_category', 'photo', 'photo_thumbnail', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'id_photo', 'id');
    }

    public function displayImage()
    {
        return 'data:image/jpeg;base64,' . base64_encode($this->photo);
    }

    public function getRating()
    {
        $rating = $this->rates->avg('rate');

        return $rating ? $rating : 0;
    }
}
