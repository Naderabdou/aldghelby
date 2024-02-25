<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['icon_path'];

        // get title translation
        public function getTitleAttribute()
        {
            return $this->attributes['title_' . app()->getLocale()];
        } // end getNameAttribute
        public function getDescAttribute()
        {
            return $this->attributes['desc_' . app()->getLocale()];
        } // end getNameAttribute
        // get icon url
        public function getIconPathAttribute()
        {
            return asset($this->icon) ;
        } // end getIconUrlAttribute

}
