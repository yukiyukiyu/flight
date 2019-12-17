@extends("layouts.app")

@section("title", "注册")

@section("body")
<div class="row">
    <div class="col col-lg-8 mx-auto">欢迎注册飞机订票系统！请填写以下信息作为您的登录凭据：</div>
</div>
<div class="row mt-lg-5">
    <div class="col col-lg-8 mx-auto">
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" class="form-control" id="username" name="username" />
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="password_confirm">确认密码</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" />
            </div>
            <button type="submit" class="btn btn-primary">注册</button>
        </form>
    </div>
</div>
@endsection