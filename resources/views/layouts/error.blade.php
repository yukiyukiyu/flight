@extends("layouts.app")

@section("title", "出错啦！")

@section("body")
<div class="row">
    <div class="col col-lg-8 mx-auto">{{$message}}</div>
</div>
<div class="row">
    <div class="col col-lg-8 mx-auto"><a href="javascript:window.history.back()">返回</a></div>
</div>
@endsection