<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path'];


    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }

    public function getImagePathAttribute()
    {
        return asset($this->image);
    }

    public function getIconPathAttribute()
    {
        return asset($this->icon);
    }
}
