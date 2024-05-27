<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'id',

        'first_name',
        'last_name',
        'middle_name',

        'created_at',
        'updated_at'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
