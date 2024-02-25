<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $appends = ['image_path'];

        // get title translation

        // get icon url
        public function getImagePathAttribute()
        {
            return asset($this->image) ;
        } // end getIconUrlAttribute
}

