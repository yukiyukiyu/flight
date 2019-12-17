@extends('layouts.app')

@section('title', '后台')

@section('body')
<a class="btn btn-primary" href="/admin/users">用户信息管理</a>
<a class="btn btn-primary" href="/admin/airports">机场信息管理</a>
<a class="btn btn-primary" href="/admin/flights">航班信息管理</a>
<a class="btn btn-primary" href="/admin/announcements">公告管理</a>
@endsection