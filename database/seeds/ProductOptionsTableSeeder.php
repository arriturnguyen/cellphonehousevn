<?php

use Illuminate\Database\Seeder;

class ProductOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductOption::class, 10)->create();
    }
}
