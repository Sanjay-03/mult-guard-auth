<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Posts extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'title',
        'image',
        'description',
        'created_at',
        'updated_at'
    ];
}
