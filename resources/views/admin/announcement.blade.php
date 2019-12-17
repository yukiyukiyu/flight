@extends('layouts.app')

@section('title', '公告管理')

@section('body')
<form action="/admin/announcement/{{$announcement->id}}/update" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" readonly class="form-control-plaintext"
            value="{{$announcement->id}}" />
    </div>
    <div class="form-group">
        <label for="name">标题</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$announcement->title}}" />
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea class="form-control" id="content" name="content">{{$announcement->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
@endsection