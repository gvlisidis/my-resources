<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Package;
use App\Models\Snippet;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'George',
             'email' => 'gv@mail.com',
         ]);

//         Article::factory(36)->create();
//         Blog::factory(25)->create();
//         Video::factory(51)->create();
//         Package::factory(6)->create();
//         Snippet::factory(94)->create();
//         Book::factory(14)->create();
    }
}
