<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image_path'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image
            ? url(Storage::url($this->image))
            : null;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}