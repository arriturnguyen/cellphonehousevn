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
                'option_name' => 'Đen',
                'option_group_id' => '1',
            ],
         	[
                'option_name' => 'Bạc',
                'option_group_id' => '1',
            ],
            [
                'option_name' => 'Đỏ',
                'option_group_id' => '1',
            ],
            [
                'option_name' => 'Trắng',
                'option_group_id' => '1',
            ],
            [
                'option_name' => 'Vàng kim',
                'option_group_id' => '1',
            ],
            [
                'option_name' => 'Xanh',
                'option_group_id' => '1',
            ],
            [
                'option_name' => '32GB',
                'option_group_id' => '2',
            ],
            [
                'option_name' => '64GB',
                'option_group_id' => '2',
            ],
            [
                'option_name' => '128GB',
                'option_group_id' => '2',
            ]
        ]);
    }
}
