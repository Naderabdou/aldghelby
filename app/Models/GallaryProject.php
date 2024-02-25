<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GallaryProject extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'project_id'];
    protected $appends = ['image_path'];


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getImagePathAttribute()
    {

        return asset($this->image);
    }
    
}
