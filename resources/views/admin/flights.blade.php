@extends('layouts.app')

@section('title', '航班信息管理')

@section('body')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/admin">公告管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/users">用户信息管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/airports">机场信息管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/admin/flights">航班信息管理</a>
    </li>
</ul>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>航班号</th>
            <th>票价</th>
            <th>客舱容量</th>
            <th>出发机场</th>
            <th>登机口</th>
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
            <td>{{$flight->id}}</td>
            <td><a href="/admin/flight/{{$flight->id}}">{{$flight->flight_number}}</a></td>
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
<a href="/admin/flight/add" class="btn btn-primary">添加</a>
@endsection