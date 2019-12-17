@extends('layouts.app')

@section('title', '登录')

@section('body')
<div class="row mt-lg-5 align-items-center">
    <div class="col-0 col-lg-8">
        <p class="h1">欢迎使用飞机订票系统</p>
    </div>
    <div class="col-12 col-lg-4">
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
    </div>
</div>
@endsection