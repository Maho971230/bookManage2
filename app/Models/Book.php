<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn',
        'title',
        'writer',
        'publisher',
        'price'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getAverageRatingAttribute()
    {
        if ($this->reviews->isEmpty()) {
            return 0; // レビューがない場合は0を返す
        }
        return $this->reviews->avg('rating');
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews->count();
    }
}
