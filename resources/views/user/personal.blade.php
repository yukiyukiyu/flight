@extends('layouts.app')

@section('title', '用户信息管理')

@section('body')
<form action="/personal/update" method="post">
    @csrf
    <div class="form-group">
        <label for="password_old">旧密码</label>
        <input type="password" class="form-control" id="password_old" name="password_old" />
    </div>
    <div class="form-group">
        <label for="password">新密码</label>
        <input type="password" class="form-control" id="password" name="password" />
    </div>
    <div class="form-group">
        <label for="password_confirm">确认密码</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" />
    </div>
    <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$passenger->name}}" />
    </div>
    <div class="form-group">
        <label for="id_number">身份证号</label>
        <input type="text" class="form-control" id="id_number" name="id_number" value="{{$passenger->id_number}}" />
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
@endsection