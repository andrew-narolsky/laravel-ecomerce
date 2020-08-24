<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
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
        'text',
        'price',
        'category_id',
        'seo_h1',
        'seo_title',
        'seo_description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function getPrice()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->quantity * $this->price;
        }
        return $this->price;
    }

    public function saveImage($image)
    {
        if ($image != null) {
            $this->removeImage();
            $filename = 'products/' . $this->slug . '.' . $image->extension();
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

    public function removeGallery()
    {
        Storage::deleteDirectory('products/' . $this->slug);
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            $this->status = 0;
        } else {
            $this->status = 1;
        }
        $this->save();
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

    public function saveOffers($offers, $flag)
    {
        if ($offers) {
            if ($flag) {
                $this->offers()->delete();
            }
            foreach ($offers as $offer) {
                if ($offer['title'] && $offer['title']) {
                    $this->offers()->create([
                        'product_id' => $this->id,
                        'title' => $offer['title'],
                        'price' => $offer['price']
                    ]);
                }
            }
        }
    }

    public function saveGallery($gallery_images, $flag)
    {
        if ($gallery_images) {
            $gallery = new Gallery();
            if (!$flag) {
                foreach ($gallery_images as $image) {
                    $filename = Str::random(10) . '.' . $image->extension();
                    $gallery->saveImage($image, $filename, $this->slug);
                    $this->galleries()->create([
                        'image' => $filename,
                        'product_id' => $this->id
                    ]);
                }
            } else {
                foreach ($gallery_images as $image) {
                    $filename = Str::random(10) . '.' . $image->extension();
                    $gallery->saveImage($image, $filename, $this->slug);
                    $this->galleries()->saveMany([
                        new Gallery([
                            'image' => $filename,
                            'product_id' => $this->id
                        ])
                    ]);
                }
            }
        }
    }
}
