<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mb-0 h1" href="/">飞机订票系统</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" id="flight">
                <a class="nav-link" href="/flight">航班</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            @if(Session::has('user_id'))
            <li class="nav-item">
                <span class="navbar-text">您好，{{Session::get('username')}}！</span>
            </li>
            <li class="nav-item">
                @if(Session::get('user_role') == 0)
                <a class="nav-link" href="/admin">后台</a>
                @else
                <a class="nav-link" href="/personal">个人中心</a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">注销</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/login">登录{{Session::get('user_id')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">注册</a>
            </li>
            @endif
        </ul>
    </div>
</nav>