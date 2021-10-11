<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category' => '寿司',
            'shop_id' => '1'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '寿司',
            'shop_id' => '10'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '寿司',
            'shop_id' => '14'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '寿司',
            'shop_id' => '19'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '焼肉',
            'shop_id' => '2'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '焼肉',
            'shop_id' => '6'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '焼肉',
            'shop_id' => '11'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '焼肉',
            'shop_id' => '12'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '焼肉',
            'shop_id' => '18'
        ];
        DB::table('categories')->insert($param);


        $param = [
            'category' => '居酒屋',
            'shop_id' => '3'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '居酒屋',
            'shop_id' => '9'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '居酒屋',
            'shop_id' => '13'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '居酒屋',
            'shop_id' => '16'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'イタリアン',
            'shop_id' => '4'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => 'イタリアン',
            'shop_id' => '7'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => 'イタリアン',
            'shop_id' => '20'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'ラーメン',
            'shop_id' => '5'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => 'ラーメン',
            'shop_id' => '8'
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => 'ラーメン',
            'shop_id' => '15'
        ];
        DB::table('categories')->insert($param);
    }
}
