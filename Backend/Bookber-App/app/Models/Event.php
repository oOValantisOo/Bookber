<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Model{
    use HasFactory;
    protected $fillable = [
        'EventTitle', 'EventDescription', 'StartDate', 'EndDate', 'EventCategory'
    ];
}