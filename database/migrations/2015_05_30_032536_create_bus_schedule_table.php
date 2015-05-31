<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_schedule', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('bus_serviceno');
			$table->string('bus_stopno');
                        $table->time('bus_time');
                        
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bus_schedule');
	}

}
