<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }
    protected $fillable = [
        'member_id',
        'book_id',
        'borrow_date',
        'return_date',
];
}
