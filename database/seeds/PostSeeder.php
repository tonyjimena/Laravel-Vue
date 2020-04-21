<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 50)->create();
        // DB::table('posts')->insert([
        //     'post_title' => Str::random(10),
        //     'post_body' => Str::random(60),
        //     'user' => 'tonySEEDER',
        // ]); php artisan db:seed --class=UsersTableSeeder

    }
}
