@extends('layouts.app')

@section('title', '机场信息管理')

@section('body')
<form action="/admin/airport/{{$airport->id}}/update" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id" readonly class="form-control-plaintext"
            value="{{$airport->id}}" />
    </div>
    <div class="form-group">
        <label for="name">机场名</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$airport->name}}" />
    </div>
    <div class="form-group">
        <label for="city">所在地</label>
        <input type="text" class="form-control" id="city" name="city" value="{{$airport->city}}" />
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
@endsection