<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'name' => 'Đen',
                'option_group_id' => '1',
            ],
         	[
                'name' => 'Bạc',
                'option_group_id' => '1',
            ],
            [
                'name' => 'Đỏ',
                'option_group_id' => '1',
            ],
            [
                'name' => 'Trắng',
                'option_group_id' => '1',
            ],
            [
                'name' => 'Vàng kim',
                'option_group_id' => '1',
            ],
            [
                'name' => 'Xanh',
                'option_group_id' => '1',
            ],
            [
                'name' => '32GB',
                'option_group_id' => '2',
            ],
            [
                'name' => '64GB',
                'option_group_id' => '2',
            ],
            [
                'name' => '128GB',
                'option_group_id' => '2',
            ]
        ]);
    }
}
