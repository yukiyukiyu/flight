@extends('layouts.app')

@section('title', '机票购买')

@section('body')
请核对要购买的机票信息：
<table class="table">
    <tbody>
        <tr>
            <td>航班号</td>
            <td>{{$flight->flight_number}}
        </tr>
    </tbody>
</table>
<form action='/flight/{{$flight->id}}/buy' method='post'>
    @csrf
    <button type='submit' class='btn btn-primary'>确认</button>
</form>
@endsection