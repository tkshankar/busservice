@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                            @if(!empty($busarrivalsinfo['description']))
                                    <div class="panel-heading">{{@$busarrivalsinfo['description']}}
                                        <br>
                                        {{@$busarrivalsinfo['road']}}
                                        <span class="info-right">stop #{{@$busarrivalsinfo['code']}}</span>
                                    </div>

                                    <div class="panel-body">
                                            @include('busarrival.table')
                                    </div>
                            @else
                                    <div class="panel-body">
                                        <p class="alert alert-danger">No service available at this route</p>
                                    </div>
                           @endif 
                            
			</div>
		</div>
	</div>
</div>
@endsection
