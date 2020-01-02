@extends('layouts.app')

@section('title', '航班信息管理')

@section('body')
<form action="/admin/flight/{{$flight->id}}/update" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" readonly class="form-control-plaintext"
            value="{{$flight->id}}" />
    </div>
    <div class="form-group">
        <label for="flight_number">航班号</label>
        <input type="text" class="form-control" id="flight_number" name="flight_number"
            value="{{$flight->flight_number}}" />
    </div>
    <div class="form-group">
        <label for="price">票价</label>
        <input type="text" class="form-control" id="price" name="price" value="{{$flight->price}}" />
    </div>
    <div class="form-group">
        <label for="capacity">客舱容量</label>
        <input type="text" class="form-control" id="capacity" name="capacity" value="{{$flight->capacity}}" />
    </div>
    <div class="form-group">
        <label for="departure_airport_id">出发机场</label>
        <select class="form-control" id="departure_airport_id" name="departure_airport_id">
            @foreach($airports as $airport)
            <option value="{{$airport->id}}" @if ($flight->departure_airport_id==$airport->id) selected
                @endif>{{$airport->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="departure_time">出发时间</label>
        <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" value="{{date('Y-m-d\TH:i',
            strtotime($flight['departure_time']))}}" />
    </div>
    <div class="form-group">
        <label for="expected_delay">预计出发延误</label>
        <input type="time" class="form-control" id="expected_delay" name="expected_delay"
            value="{{$flight->expected_delay}}" />
    </div>
    <div class="form-group">
        <label for="arrival_airport_id">到达机场</label>
        <select class="form-control" id="arrival_airport_id" name="arrival_airport_id">
            @foreach($airports as $airport)
            <option value="{{$airport->id}}" @if ($flight->arrival_airport_id==$airport->id) selected
                @endif>{{$airport->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="expected_arrival_time">预计到达时间</label>
        <input type="datetime-local" class="form-control" id="expected_arrival_time" name="expected_arrival_time"
            value="{{date('Y-m-d\TH:i', strtotime($flight->expected_arrival_time))}}" />
    </div>
    <div class="form-group">
        <label for="expected_arrival_delay">预计到达延误</label>
        <input type="time" class="form-control" id="expected_arrival_delay" name="expected_arrival_delay"
            value="{{$flight->expected_arrival_delay}}" />
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
<script>
    change = function(){
        $('.departure_port').addClass('d-none');
        $('.departure_port_of_'+$('#departure_airport_id').val()).removeClass('d-none');
    }
    $(document).ready(change);
    $('#departure_airport_id').change(change);
</script>
@endsection