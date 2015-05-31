<?php
/*** Created by Shankar **/
use Illuminate\Database\Seeder;

class BusscheduleTableSeeder extends Seeder {
	
	public function run()
	{
		\DB::table('bus_schedule')->insert(array(
			'busstop_id'=>'198',
			'bus_time'=>'23.58:00'
		));	
	}

}
  	 