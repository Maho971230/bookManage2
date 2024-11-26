<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'content',
        'rating',
        'employee_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
