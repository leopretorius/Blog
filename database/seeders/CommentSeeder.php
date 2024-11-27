<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::query()->delete();

        $userIds = User::pluck('id');
        $postIds = Post::pluck('id');
        Comment::factory(100)->create([
            'user_id' => fn() => $userIds->random(),
            'post_id' => fn() => $postIds->random()
        ]);
    }
}
