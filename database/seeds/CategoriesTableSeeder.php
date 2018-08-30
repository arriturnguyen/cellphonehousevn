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
                'category_name' => 'Điện thoại',
                'parent_id' => '0',
                'slug' => 'dien-thoai'
            ],
            [
                'category_name' => 'Phụ kiện',
                'parent_id' => '0',
                'slug' => 'phu-kien'
            ],
            [
                'category_name' => 'Máy cũ giá rẻ',
                'parent_id' => '0',
                'slug' => 'may-cu'
            ],
            [
                'category_name' => 'Apple',
                'parent_id' => '1',
                'slug' => 'apple'
            ],
            [
                'category_name' => 'Samsung',
                'parent_id' => '1',
                'slug' => 'samsung'
            ],
            [
                'category_name' => 'Sony',
                'parent_id' => '1',
                'slug' => 'sony'
            ],
            [
                'category_name' => 'Asus',
                'parent_id' => '1',
                'slug' => 'asus'
            ],
            [
                'category_name' => 'Huawei',
                'parent_id' => '1',
                'slug' => 'huawei'
            ],
            [
                'category_name' => 'Oppo',
                'parent_id' => '1',
                'slug' => 'oppo'
            ]
        ]);
    }
}
