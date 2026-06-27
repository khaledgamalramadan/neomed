<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'linkedin',
        'image',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url(Storage::url($this->image))
            : null;
    }
}