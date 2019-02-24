<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'paris@gmail.com',
            'password' => bcrypt('123456'),
            'admin'=>1,
            'adminOn'=>'elpartalon'
        ]);
    }
}
