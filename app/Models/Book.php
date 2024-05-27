<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'id',

        'title', 
        'description', 
        'image', 
        'published_at',

        'created_at',
        'updated_at'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
