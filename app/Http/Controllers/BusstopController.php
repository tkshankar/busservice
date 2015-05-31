<?php namespace busservice\Http\Controllers;

use busservice\Busstop;
use busservice\Http\Controllers\Controller;

class BusstopController extends Controller {

        /**
	 Deny Access for guest user
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
        
    
        /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
             /* Currently in the database the record is only available for the below mentioned 3 regions, 
              * Please use Migration script if you want to load more content in the databae  */
            
             // 1.3327229999999999,103.89125949999999 (Oxley Biz Hub)
             // 1.3521581999999999,103.753818 (Bukit Batok Street 52)
             // 1.298131,103.788034 (79 Ayer Rajah Crescent, #02-10, Singapore 139955)
             
             //User location hard coded here    
              $lat="1.3327229999999999";
              $lng="103.89125949999999";
              $dist="25"; 
              
              $busstops = Busstop::selectRaw("*,
                              ( 6371 * acos( cos( radians($lat) ) *
                                cos( radians( lat ) )
                                * cos( radians( lng ) - radians($lng)
                                ) + sin( radians($lat) ) *
                                sin( radians( lat ) ) )
                              ) AS distance")
                        ->having("distance", "<", $dist)
                        ->orderBy("distance")
                        ->limit(10)
                        ->get();          
              
		return view('busstop.index', compact('busstops'));
	}	

}
