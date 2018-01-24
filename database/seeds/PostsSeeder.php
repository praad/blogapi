<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Post::class, 50)->create();
        /*
        $posts = [
            [
                'slug' => 'Keresőoptimalizált cím 1.',
                'author' => '1',
                'title' => 'Cím 1',
                'body' => 'Body szöveg 1.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'Keresőoptimalizált cím 2.',
                'author' => '1',
                'title' => 'Cím 2',
                'body' => 'Body szöveg 2.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'slug' => 'Keresőoptimalizált cím 3.',
                'author' => '1',
                'title' => 'Cím 3',
                'body' => 'Body szöveg 3.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('posts')->insert($posts);
        */
    }
}
