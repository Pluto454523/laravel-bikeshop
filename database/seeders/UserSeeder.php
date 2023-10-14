<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert( array(
            [
                'name'=>'Nawin Khamchun',
                'email' => 'nawin3399@gmail.com',
                'password' => '$2y$10$zWL5juwNI4wHbOskDfsave2EpfrOHJLi.5fqw5qbC1.kzXQW/FuFS'
            ]

        ));
    }
}
