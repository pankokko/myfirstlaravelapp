<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('categories')->insert([
            [
                'name'           => '風景',
                'created_at'     => '2019-12-30-12:00:00',
                'updated_at'     => '2019-12-30-12:00:00'
            ],
            [
                'name'           => '街並み',
                'created_at'     => '2019-12-30-12:00:00',
                'updated_at'     => '2019-12-30-12:00:00'
            ],
            [
                'name'           => '人物',
                'created_at'     => '2019-12-30-12:00:00',
                'updated_at'     => '2019-12-30-12:00:00'
            ],
        ]);





    }
}
