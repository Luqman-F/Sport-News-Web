<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'author_id',
        'views',
    ];

    function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
