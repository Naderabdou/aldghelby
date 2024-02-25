<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'image',
    ];

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

    public function gallary()
    {
        return $this->hasMany(GallaryProject::class, 'project_id');
    } // end of gallary
    // get icon url
}
