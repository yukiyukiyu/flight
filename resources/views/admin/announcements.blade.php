@extends('layouts.app')

@section('title', '公告管理')

@section('body')
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