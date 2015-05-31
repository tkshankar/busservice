<table class="table table-striped">
   
    @foreach($busstops as $busstop)    
    <tr>
        <td><a class="bus-info" href="{{ url('busarrival/'.$busstop->code) }}"><span class="bus-info-bld">{{$busstop->description}}</span><br>{{$busstop->road}}</a></td>
        <td><span class="bus-info-1">{{round($busstop->distance,3)}} m</br>Bus stop #{{$busstop->code}}</span></td>
    </tr>
    @endforeach    
    
</table>