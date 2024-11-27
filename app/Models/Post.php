<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        /**
         * Define a polymorphic one-to-many relationship.
         *
         * This function sets up a polymorphic relationship where the current model
         * can have many 'Like' models associated with it. The 'likeable' parameter
         * is the name of the polymorphic relation.
         *
         * @return \Illuminate\Database\Eloquent\Relations\MorphMany
         */
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }
}
