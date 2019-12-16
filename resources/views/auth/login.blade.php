@extends('layouts.app')

@section('title', '登录')

@section('body')
<form action="/login" method="post">
    @csrf
    <div class="form-group">
        <label for="username">用户名</label>
        <input type="text" class="form-control" id="username" name="username" />
    </div>
    <div class="form-group">
        <label for="password">密码</label>
        <input type="password" class="form-control" id="password" name="password" />
    </div>
    <button type="submit" class="btn btn-primary">登录</button>
</form>
@endsection