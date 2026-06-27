<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url(Storage::url($this->image))
            : null;
    }
}
