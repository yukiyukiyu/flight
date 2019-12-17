@extends('layouts.app')

@section('title', '机场信息管理')

@section('body')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>机场名</th>
            <th>所在地</th>
        </tr>
    </thead>
    <tbody>
        @foreach($airports as $airport)
        <tr>
            <td>{{$airport->id}}</td>
            <td><a href="/admin/airport/{{$airport->id}}">{{$airport->name}}</a></td>
            <td>{{$airport->city}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/airport/add" class="btn btn-primary">添加</a>
@endsection