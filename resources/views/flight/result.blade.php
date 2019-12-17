@extends('layouts.app')

@section('title', '航班查询结果')

@section('body')
<table class="table">
    <thead>
        <tr>
            <th>航班号</th>
            <th>票价</th>
            <th>客舱容量</th>
            <th>出发机场</th>
            <th>出发时间</th>
            <th>预计出发延误</th>
            <th>到达机场</th>
            <th>预计到达时间</th>
            <th>预计到达延误</th>
        </tr>
    </thead>
    <tbody>
        @foreach($flights as $flight)
        <tr>
            <td><a href='/flight/{{$flight->id}}/'>{{$flight->flight_number}}</a></td>
            <td>{{$flight->price}}</td>
            <td>{{$flight->capacity}}</td>
            <td>{{$flight->departureAirport->name}}</td>
            <td>{{$flight->departure_time}}</td>
            <td>{{$flight->expected_delay}}</td>
            <td>{{$flight->arrivalAirport->name}}</td>
            <td>{{$flight->expected_arrival_time}}</td>
            <td>{{$flight->expected_arrival_delay}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection