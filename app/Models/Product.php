<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'type_id', 'published_at', 'not_allow_promotion', 'handle', 'page_title'];

    public function productvariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
        // provides access to the related records.
