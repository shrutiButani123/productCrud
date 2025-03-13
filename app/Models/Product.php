<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'subcategory_id',
        'price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product belongs to one subcategory (optional)
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    } 
}
