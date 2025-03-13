<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A subcategory has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
