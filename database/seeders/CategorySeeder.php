<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Cà phê'],
            ['name'=>'Trà hoa quả'],
            ['name'=>'Smoothies'],
            ['name'=>'Bánh ngọt'],
        ];
        DB::table('categories')->insert($data);
    }
}
