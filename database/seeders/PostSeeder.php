<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::query()->delete();

        $userIds = User::pluck('id');

        Post::factory(30)->create([
            'user_id' => fn() => $userIds->random()
        ]);
    }
}
