<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert( array(
            [
                'ref_id'=>'PO202310141',
                'user_id' => 1,
                'status' => 1
            ]
        ));
    }
}
