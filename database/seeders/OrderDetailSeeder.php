<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail')->insert( array(
            [
                'product_id'=> 8,
                'order_id' => 1,
                'qty' => 10
            ]

        ));

    }
}
