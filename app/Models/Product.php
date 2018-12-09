<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['title', 'description', 'url', 'category_id', 'price', 'photo'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
