@extends('layouts.app')

@section('title', '订单管理')

@section('body')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/personal">用户信息</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/personal/orders">订单管理</a>
    </li>
</ul>
<table class="table">
    <thead>
        <tr>
            <th>订单号</th>
            <th>航班</th>
            <th>出发时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->flight->flight_number}}</td>
            <td>{{$order->flight->departure_time}}</td>
            <td>
                <a href="/order/{{$order->id}}/change" class="btn btn-primary">改签</a>
                <a href="/order/{{$order->id}}/refund" class="btn btn-primary">退票</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection