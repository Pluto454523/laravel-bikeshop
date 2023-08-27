<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert( array(
            [
                'code'=>'007',
                'name' => 'เสื้อยืด Uniqlo Size XS',
                'category_id' => 2,
                'price' => 490,
                'stock_qty' => 10
            ],
            [
                'code'=>'001',
                'name' => 'เสื้อยืด Uniqlo Size S',
                'category_id' => 2,
                'price' => 490,
                'stock_qty' => 10
            ],
            [
                'code'=>'002',
                'name' => 'เสื้อยืด Uniqlo Size M',
                'category_id' => 2,
                'price' => 490,
                'stock_qty' => 10
            ],
            [
                'code'=>'003',
                'name' => 'เสื้อยืด Uniqlo Size L',
                'category_id' => 2,
                'price' => 520,
                'stock_qty' => 10
            ],
            [
                'code'=>'008',
                'name' => 'เสื้อยืด Uniqlo Size XL',
                'category_id' => 2,
                'price' => 520,
                'stock_qty' => 10
            ],
            [
                'code'=>'009',
                'name' => 'เสื้อยืด Uniqlo Size 2XL',
                'category_id' => 2,
                'price' => 550,
                'stock_qty' => 10
            ],
            [
                'code'=>'010',
                'name' => 'เสื้อยืด Uniqlo Size 3XL',
                'category_id' => 2,
                'price' => 550,
                'stock_qty' => 10
            ],
            [
                'code'=>'004',
                'name' => 'ล้อรถยนต์',
                'category_id' => 1,
                'price' => 2500,
                'stock_qty' => 10
            ],
            [
                'code'=>'005',
                'name' => 'พวงมาลัย',
                'category_id' => 1,
                'price' => 4900,
                'stock_qty' => 10
            ],
            [
                'code'=>'006',
                'name' => 'Nike air force 1 เบอร์ 38 US',
                'category_id' => 3,
                'price' => 1490,
                'stock_qty' => 10
            ],
         ));
    }
}
