@extends('layouts.app')

@section('title', '用户信息管理')

@section('body')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>用户名</th>
            <th>身份</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="/admin/user/{{$user->id}}">{{$user->username}}</a></td>
            <td>{{$user->roleWord()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/user/add" class="btn btn-primary">添加</a>
@endsection