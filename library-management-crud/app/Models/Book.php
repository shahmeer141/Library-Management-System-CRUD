<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function borrowedBooks(){
        return $this->hasMany(BorrowedBook::class);
    }

    protected $fillable = [
        'title',
        'author',
        'category',
        'published_year',
        'available_copies',
    ];
}
