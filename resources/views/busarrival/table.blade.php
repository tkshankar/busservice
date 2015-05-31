<table class="table table-striped">
    <tr>
        <td class="bus-info bus-info-bld">Bus No.</td> 
        <td class="bus-info bus-info-bld">Arriving {!!Html::image('img/bus.png')!!}</td>  
        <td class="bus-info bus-info-bld">Next Bus {!!Html::image('img/bus.png')!!}</td>  
 @if(isset($busarrivalsinfo['times']))
    @foreach($busarrivalsinfo['times'] as $buskey=>$busarrivaltimes)
    <tr>
        <td class="bus-info-bld">{{$buskey}}</td>
        
        @foreach($busarrivaltimes as $timeslist)
        
            @if($timeslist>0) 
            <td>{{$timeslist}}&nbsp;<sub>min</sub></td> 
             
            @else 
            <td>Arrival</td>
            @endif
            
        @endforeach
    </tr>
    @endforeach
    
  @endif

</table>