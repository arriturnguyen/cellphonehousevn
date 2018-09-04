<?php

use Illuminate\Database\Seeder;

class OptionGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_groups')->insert([
            [
                'name' => 'Màu sắc'
            ],
            [
                'name' => 'Bộ nhớ'
            ]
        ]);
    }
}
