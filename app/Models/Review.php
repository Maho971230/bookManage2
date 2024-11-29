<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['content', 'rating'];
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
