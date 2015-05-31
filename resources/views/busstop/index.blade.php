@extends('app')

@section('content')
<div class="container">
   
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bus Stops Nearby - Oxley Biz Hub</div>
                                    
                                    @if($busstops->count() > 0)
                                    
                                        <div class="panel-body">
                                            @include('busstop.table') 
                                        </div>
                                    
                                    @else
                                    
                                            <div class="panel-body">
                                            <p class="alert alert-danger">No Bus stops available at your current location!</p>
                                            </div>
                                    
                                    @endif				
                               
			</div>
		</div>
	</div>
</div>
@endsection
