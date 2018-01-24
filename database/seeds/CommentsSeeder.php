<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(App\Comment::class, 50)->create();

              //
              /*
              $comments = [
                [
                    'author' => '1',
                    'post_id' => '1',
                    'body' => 'Comment body 1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'author' => '1',
                    'post_id' => '1',
                    'body' => 'Comment body 2',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'author' => '1',
                    'post_id' => '1',
                    'body' => 'Comment body 3',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'author' => '1',
                    'post_id' => '1',
                    'body' => 'Comment body 4',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];
    
            DB::table('comments')->insert($comments);
            */
    }
}
