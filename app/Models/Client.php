<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image_path'];

    // get title translation
    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    } // end getNameAttribute

    public function getDescAttribute()
    {
        return $this->attributes['desc_' . app()->getLocale()];
    } // end getNameAttribute

    public function getImagePathAttribute()
    {

        return asset($this->image);
    }
}
