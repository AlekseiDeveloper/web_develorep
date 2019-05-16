<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'name'     => 'Автор не известен',
                'email'    => 'autor_unknown@gmail.com',
                'password' => bcrypt(str_random(16)),
                'role'     => 'user'
            ],
            [
                'name'     => 'Автор',
                'email'    => 'autor@gmail.com',
                'password' => bcrypt('123123'),
                'role'     => 'user'
            ],
        ];

        DB::table('users')->insert($data);

    }
}
