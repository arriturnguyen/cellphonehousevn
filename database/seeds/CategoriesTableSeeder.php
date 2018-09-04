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
                'name' => 'Điện thoại',
                'parent_id' => '0',
                'slug' => 'dien-thoai'
            ],
            [
                'name' => 'Phụ kiện',
                'parent_id' => '0',
                'slug' => 'phu-kien'
            ],
            [
                'name' => 'Máy cũ giá rẻ',
                'parent_id' => '0',
                'slug' => 'may-cu'
            ],
            [
                'name' => 'Apple',
                'parent_id' => '1',
                'slug' => 'apple'
            ],
            [
                'name' => 'Samsung',
                'parent_id' => '1',
                'slug' => 'samsung'
            ],
            [
                'name' => 'Sony',
                'parent_id' => '1',
                'slug' => 'sony'
            ],
            [
                'name' => 'Asus',
                'parent_id' => '1',
                'slug' => 'asus'
            ],
            [
                'name' => 'Huawei',
                'parent_id' => '1',
                'slug' => 'huawei'
            ],
            [
                'name' => 'Oppo',
                'parent_id' => '1',
                'slug' => 'oppo'
            ]
        ]);
    }
}
