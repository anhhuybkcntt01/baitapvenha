<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('posts')->insert([
//            'slug'=>Str::random(10),
//            'title'=>Str::random(50),
//            'content'=>Str::random(100),
//            'created_at'=>date('Y-m-d H:i:s'),
//            'updated_at'=>date('Y-m-d H:i:s'),
//        ]);

        Post::factory(278)->create();


    }
}
