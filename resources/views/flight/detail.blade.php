@extends('layouts.app')

@section('title', '航班信息')

@section('body')
<table class="table">
    <tbody>
        <tr>
            <td>航班号</td>
            <td>{{$flight->flight_number}}
        </tr>
    </tbody>
</table>
@if (Session::get('user_role') == 1)
<a href='/flight/{{$flight->id}}/buy' class='btn btn-primary'>购买</a>
@endif
@endsection