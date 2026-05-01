<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_code',
        'title',
        'author',
        'genre',
        'published_year',
        'category_id',
    ];

    // A Book can be borrowed by many Members (Users)
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // A Book belongs to one Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}