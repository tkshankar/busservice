<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusstopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bus_stop', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('link_id');
                        $table->string('bus_code');
                        $table->string('updated');
			$table->string('code');
                        $table->string('road');
                        $table->string('description');
			$table->string('summary');
                        $table->string('created_date');
                        $table->string('lat');
			$table->string('lng');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bus_stop');
	}

}
