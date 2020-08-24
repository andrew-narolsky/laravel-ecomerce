<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'product_id',
        'image'
    ];

    public function saveImage($image, $filename, $slug)
    {
        if ($image != null) {
            $image->storeAs('products/' . $slug, $filename);
        }
    }
}
