<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

        DB::table('pictures')->truncate();

        $faker = Faker::create();

        $users = App\User::all();

        foreach($users as $user) {
            $user->pictures()->saveMany(factory(App\Picture::class, 2)->make());
        }

        
        $pictures = App\Picture::all();

        foreach($pictures as $picture) {

            // add likes
            $user = App\User::orderByRaw("RAND()")->first();

            $picture->like_users()->attach($user);

            $tag = App\Tag::orderByRaw("RAND()")->first();

            // add tags
            $picture->tags()->attach($tag);

            // add comments
            for($i=0;$i<3;$i++) {

                $picture->comments()->save($user, ['body' => $faker->sentence]);

            }

        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // disable foreign key constraints
    }
}
