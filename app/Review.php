<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'photo',
    ];

    public function photoLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->photo != '') {
            $image = asset('uploads/reviews/'.$this->id.'/'.$this->photo);
        }

        return $image;
    }
}
