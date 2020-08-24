<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
