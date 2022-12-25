<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['video'];

    public function videoLink()
    {
        $video = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->video != '') {
            $video = asset('uploads/'.$this->video);
        }

        return $video;
    }
}
