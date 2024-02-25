<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurValue extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $appends = ['icon_path'];

    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }



    public function getServicesAttribute()
    {
        return $this->{'services_' . app()->getLocale()};
    }

    public function getIconPathAttribute()
    {

        return asset($this->icon);
    }
}
