@extends('layouts.app')

@section('title', '首页')

@section('body')
<div class="row">
    <div class="col-12 col-lg-9">
        @if(Session::get('user_role') == 1 && count($orders) > 0)
        <h1>航班 - 我的行程</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>航班号</th>
                    <th>出发机场</th>
                    <th>到达机场</th>
                    <th>出发时间</th>
                    <th>预计出发延误</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="/flight/{{$order->flight->id}}/">{{$order->flight->flight_number}}</a>
                    </td>
                    <td>{{$order->flight->departureAirport->name}}</td>
                    <td>{{$order->flight->arrivalAirport->name}}</td>
                    <td>{{$order->flight->departure_time}}</td>
                    <td>{{$order->flight->expected_delay}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <h1>航班 - 即将起飞</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>航班号</th>
                    <th>出发机场</th>
                    <th>到达机场</th>
                    <th>出发时间</th>
                    <th>预计出发延误</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <td>
                        <a href="/flight/{{$flight->id}}/">{{$flight->flight_number}}</a>
                    </td>
                    <td>{{$flight->departureAirport->name}}</td>
                    <td>{{$flight->arrivalAirport->name}}</td>
                    <td>{{$flight->departure_time}}</td>
                    <td>{{$flight->expected_delay}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12 col-lg-3">
        <ul class="list-group">
            <li class="list-group-item list-group-item-dark">公告</li>
            @foreach($announcements as $announcement)
            <li class="list-group-item">
                <a href="/announcement/{{$announcement->id}}" class="stretched-link"></a>{{$announcement->title}}
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection