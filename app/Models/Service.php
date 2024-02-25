<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image_path', 'icon_path'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getDescAttribute()
        {
            return $this->attributes['desc_' . app()->getLocale()];
        } // end getNameAttribute
    public function getImagePathAttribute()
    {

        return asset($this->image);
    }

    public function getIconPathAttribute()
    {

        return asset($this->icon);
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

}
