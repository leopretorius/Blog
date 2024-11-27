<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost($id)
    {
        $post = Post::findOrFail($id);

        $like = $post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $post->likes()->create(['user_id' => auth()->id()]);

        return response()->json(['message' => 'Post liked successfully']);
    }

    public function unlikePost($id)
    {
        $post = Post::findOrFail($id);

        $like = $post->likes()->where('user_id', auth()->id())->first();

        if (!$like) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $like->delete();

        return response()->json(['message' => 'Post unliked successfully']);
    }

    public function likeComment($id)
    {
        $comment = Commentt::findOrFail($id);

        $like = $comment->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            return response()->json(['message' => 'Already liked'], 400);
        }

        $comment->likes()->create(['user_id' => auth()->id()]);

        return response()->json(['message' => 'Comment liked successfully']);
    }

    public function unlikeComment($id)
    {
        $comment = Comment::findOrFail($id);

        $like = $comment->likes()->where('user_id', auth()->id())->first();

        if (!$like) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $like->delete();

        return response()->json(['message' => 'Comment unliked successfully']);
    }
}
