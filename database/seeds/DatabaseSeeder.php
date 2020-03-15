<?php

use App\User;
use App\Profile;
use App\Post;
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
        //factory(User::class, 20)->create();
        //factory(Profile::class, 50)->create();
        //factory(Post::class, 500)->create();
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'password' => bcrypt('admin@gmail.com')
        ]);
    }
}
