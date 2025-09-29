<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'category_id',
        'author_id',
        'language_id',
        'publisher_id',
        'year_id',
        'title',
        'description',
        'price',
        'is_discount',
        'discount_percent',
        'image',
        'barcode',
        'is_new',
        'is_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
