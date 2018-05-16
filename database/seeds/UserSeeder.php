<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 20; $i++) { 

		        DB::table('fd_users')->insert([
		            'username' => str_random(10),
		            'name' => str_random(10),
		            'password' => Hash::make('love'),
		            'phone'=> '13'.rand(111111111,999999999),
		         	'sex'=>'男',
		            'status'=>1
		        ]);

    }

    }
}
