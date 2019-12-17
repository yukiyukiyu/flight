@extends('layouts.app')

@section('title', '公告')

@section('body')
<div class="jumbotron">
    <h1 class="display-4">{{$announcement->title}}</h1>
    <p class="lead">{{$announcement->content}}</p>
</div>
@endsection