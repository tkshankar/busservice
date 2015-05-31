<?php namespace busservice;

use Illuminate\Database\Eloquent\Model;

class Busstop extends Model {    

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bus_stop';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['bus_code', 'code', 'road', 'description', 'summary', 'lat', 'lng'];
	
}
