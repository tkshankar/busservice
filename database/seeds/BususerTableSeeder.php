<?php
/*** Created by Shankar **/
use Illuminate\Database\Seeder;

class BususerTableSeeder extends Seeder {
	
	public function run()
	{
		\DB::table('bus_users')->insert(array(
			'name'=>'dan45',
			'email'=>'dan45@hotmail.com',
			'password'=>\Hash::make('dan123')
		));	
	}

}
