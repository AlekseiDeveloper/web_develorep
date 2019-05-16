<?php

use App\User;
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
        // $this->call(UsersTableSeeder::class);

       User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('123123123'),
            'role' => User::ROLE_ADMIN
        ]);
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ArticleTagTableSeeder::class);
    }
}
