<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Model
{
    use HasFactory;
    protected $guarded=['BookId'];
    protected $fillable = [
        'BookTitle', 'BookAuthor', 'ReleaseDate', 'BookCategory'
    ];
}