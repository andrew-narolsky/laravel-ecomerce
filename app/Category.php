<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'parent_id',
        'text',
        'seo_h1',
        'seo_title',
        'seo_description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function saveImage($image)
    {
        if ($image != null) {
            $this->removeImage();
            $filename = 'categories/' . $this->slug . '.' . $image->extension();
            $image->storeAs('', $filename);
            $this->image = $filename;
            $this->save();
        }
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('' . $this->image);
        }
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {
            $this->is_featured = 0;
        } else {
            $this->is_featured = 1;
        }
        $this->save();
    }
}
