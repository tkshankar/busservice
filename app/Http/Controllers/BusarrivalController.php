<?php namespace busservice\Http\Controllers;

use Carbon\Carbon;
use \DateTime;
use busservice\Busarrival;
use busservice\Http\Controllers\Controller;



class BusarrivalController extends Controller {

        /**
	 Deny Access for guest user
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 
         /* 
         * * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

            $date = Carbon::now();
            $date->setTimezone('Asia/Singapore');
            $current_time = $date->format('H:i:s');
            $date->modify('+60 minutes');
            $currenttimeplus_1hr = $date->format('H:i:s');

            // Get the bus arrival details for the selected bus stop
            $busarrivals =Busarrival::Raw('bus_stop.code,bus_stop.description,bus_stop.road'
                    . ',bus_mapping.bus_serviceno,bus_schedule.bus_time,bus_route.route_name')
            ->join('bus_stop', 'bus_mapping.bus_stopno', '=', 'bus_stop.code')
            ->join('bus_schedule', 'bus_mapping.id', '=', 'bus_schedule.bus_mapping_id')
            ->leftjoin('bus_route', 'bus_mapping.bus_serviceno', '=', 'bus_route.bus_serviceno')        
            ->where('bus_mapping.bus_stopno', '=', $id)
            ->where('bus_schedule.bus_time', '>=', compact('current_time'))
            ->where('bus_schedule.bus_time', '<=', compact('currenttimeplus_1hr'))
            ->get();
                       

            $busarrivalsinfo=array();
            
            //Retrive the bus service number by multidimensional array to avoid the repeating bus serive number in view
            foreach($busarrivals as $busarrival){            
                
                $curr_tm = new DateTime($current_time);
                $arrvl_tm = new DateTime($busarrival->bus_time);
                $interval = date_diff($curr_tm,$arrvl_tm);
                
               $busarrivalsinfo['times'][$busarrival->bus_serviceno][]=$interval->format('%i');
               $busarrivalsinfo['road']=$busarrival->road;
               $busarrivalsinfo['code']=$busarrival->code;
               $busarrivalsinfo['description']=$busarrival->description;

            }
            
            return view('busarrival.index', compact('busarrivalsinfo'));

	}


}
