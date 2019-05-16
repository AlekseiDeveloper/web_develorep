<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
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
                'title'     => 'php'
            ],
            [
                'title'     => 'Laravel'
            ],
            [
                'title'     => 'Doctrine'
            ],
            [
                'title'     => 'Controller'
            ],
            [
                'title'     => 'Models'
            ],
            [
                'title'     => 'ООП'
            ],
            [
                'title'     => 'Патерны'
            ],
            [
                'title'     => 'Methods'
            ],
            [
                'title'     => 'Object'
            ],
            [
                'title'     => 'Singleton'
            ],
        ];


        DB::table('tags')->insert($data);
    }
}
