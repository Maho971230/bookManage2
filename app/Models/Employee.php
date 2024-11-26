<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'content',
        'rating'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
