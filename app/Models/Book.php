<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'is_available'];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowings')
            ->withPivot(['borrowed_at', 'returned_at'])
            ->withTimestamps();
    }
}
