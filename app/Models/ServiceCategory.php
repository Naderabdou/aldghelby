<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
