@extends('layouts.app')

@section('title', '用户信息管理')

@section('body')
<form action="/personal/update" method="post">
    @csrf
    <div class="form-group">
        <label for="password_old">密码</label>
        <input type="password" class="form-control" id="password_old" name="password_old" />
    </div>
    <div class="form-group">
        <label for="password">新密码</label>
        <input type="password" class="form-control" id="password" name="password" />
    </div>
    <div class="form-group">
        <label for="password_confirm">确认密码</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" />
    </div>
    <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$passenger->name}}" />
    </div>
    <div class="form-group">
        <label for="id_number">身份证号</label>
        <input type="text" class="form-control" id="id_number" name="id_number" value="{{$passenger->id_number}}" />
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>

订单：
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