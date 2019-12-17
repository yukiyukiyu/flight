@extends('layouts.app')

@section('title', '用户信息管理')

@section('body')
<form action="/admin/user/{{$user->id}}/update" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" readonly class="form-control-plaintext" value="{{$user->id}}" />
    </div>
    <div class="form-group">
        <label for="username">用户名</label>
        <input type="text" class="form-control" id="username" name="username" @if($user->id!=0) readonly @endif
        class="form-control-plaintext"
        value="{{$user->username}}" />
    </div>
    <div class="form-group">
        <label for="password">密码</label>
        <input type="password" class="form-control" id="password" name="password" />
    </div>
    <div class="form-group">
        <label for="role">身份</label>
        <select class="form-control" id="role" name="role">
            <option value="0">管理员</option>
            <option value="1" @if($user->role==1) selected @endif>旅客</option>
        </select>
    </div>
    <div id="div1" @if($user->role!=1) class="d-none" @endif>
        <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" class="form-control" id="name" name="name" @if($user->role == 1)
            value="{{$passenger->name}}" @endif />
        </div>
        <div class="form-group">
            <label for="id_number">身份证号</label>
            <input type="text" class="form-control" id="id_number" name="id_number" @if($user->role == 1)
            value="{{$passenger->id_number}}" @endif />
        </div>
    </div>
    <button type=" submit" class="btn btn-primary">更新</button>
</form>
<script>
    $('#role').change(function(){
        $('#div'+this.value).removeClass('d-none');
        $('#div'+(1-this.value)).addClass('d-none');
    })
</script>
@endsection