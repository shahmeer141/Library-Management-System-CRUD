<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function borrowedBooks(){
        return $this->hasMany(BorrowedBook::class);
    }
    protected $fillable = [
        'name',
        'email',
        'membership_date',
];
}
