@extends('layouts.app')

@section('title', '公告管理')

@section('body')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="/admin">公告管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/users">用户信息管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/airports">机场信息管理</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/flights">航班信息管理</a>
    </li>
</ul>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>标题</th>
        </tr>
    </thead>
    <tbody>
        @foreach($announcements as $announcement)
        <tr>
            <td>{{$announcement->id}}</td>
            <td><a href="/admin/announcement/{{$announcement->id}}">{{$announcement->title}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/announcement/add" class="btn btn-primary">添加</a>
@endsection