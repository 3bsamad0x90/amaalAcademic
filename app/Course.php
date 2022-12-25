<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'des_ar',
        'des_en',
        'photo',
    ];
    public function photoLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->photo != '') {
            $image = asset('uploads/courses/'.$this->id.'/'.$this->photo);
        }

        return $image;
    }
}
