@extends('layouts.app')

@section('title', '航班查询')

@section('body')
<div>
    <form action="/flight/result" method="get">
        <div class="form-group">
            <label for="city1">出发城市</label>
            <input type="text" class="form-control" id="city1" name="city1" />
        </div>
        <div class="form-group">
            <label for="city2">到达城市</label>
            <input type="text" class="form-control" id="city2" name="city2" />
        </div>
        <div class="form-group">
            <label for="flight_number">航班号</label>
            <input type="text" class="form-control" id="flight_number" name="flight_number" />
        </div>
        <div class="form-group">
            <label for="departure_date">出发日期</label>
            <input type="date" class="form-control" id="departure_date" name="departure_date" />
        </div>
        <button type="submit" class="btn btn-primary">搜索</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        var now = new Date();
        var day = ('0' + now.getDate()).slice(-2);
        var month = ('0' + (now.getMonth() + 1)).slice(-2);
        $('#departure_date').val(now.getFullYear()+'-'+(month)+'-'+(day));
    })
</script>
@endsection