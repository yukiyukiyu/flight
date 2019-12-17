@extends('layouts.app')

@section('title', '航班查询')

@section('body')
<div class="form-group">
    <select class="form-control">
        <option value="0">查询城到城航班</option>
        <option value="1">查询指定航班号</option>
    </select>
</div>
<div id="form0">
    <form action="/flight/result" method="get">
        <input type="hidden" name="type" value="0" />
        <div class="form-group">
            <label for="city1">出发城市</label>
            <input type="text" class="form-control" id="city1" name="city1" />
        </div>
        <div class="form-group">
            <label for="city2">到达城市</label>
            <input type="text" class="form-control" id="city2" name="city2" />
        </div>
        <button type="submit" class="btn btn-primary">搜索</button>
    </form>
</div>
<div id="form1" class="d-none">
    <form action="/flight/result" method="get">
        <input type="hidden" name="type" value="1" />
        <div class="form-group">
            <label for="citflight_numbery1">航班号</label>
            <input type="text" class="form-control" id="flight_number" name="flight_number" />
        </div>
        <button type="submit" class="btn btn-primary">搜索</button>
    </form>
</div>
<script>
    $('select').change(function(){
        $('#form'+this.value).removeClass('d-none');
        $('#form'+(1-this.value)).addClass('d-none');
    })
</script>
@endsection