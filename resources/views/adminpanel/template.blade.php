<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/adminpanel/css/bootstrap.min.css">
    <link rel="stylesheet" href="/adminpanel/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/adminpanel/css/bootadmin.min.css">
    @yield('css')
    <style>
        @yield('internalcss')
    </style>
    <title>BootAdmin</title>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#">BootAdmin</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    @if(Auth::check())
                        {{Auth::user()->name}}
                        @else
                        anan
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="#" class="dropdown-item">Profile</a>
                    {!! Form::open(['route' => ['logout', Auth::id()], 'method' => 'POST']) !!}
                    {!! Form::button('Logout', ['type' => 'submit', 'class' => 'dropdown-item']) !!}
                    {!! Form::close() !!}
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="{{route('texts.index')}}"><i class="fa fa-fw fa-link"></i> Yazılar</a></li>
            <li><a href="{{route('slider.index')}}"><i class="fa fa-fw fa-link"></i> Slider</a></li>
            <li><a href="{{route('categories.index')}}"><i class="fa fa-fw fa-link"></i> Kategoriler</a></li>
            <li><a href="{{route('messages.index')}}"><i class="fa fa-fw fa-link"></i> Mesajlar</a></li>
            <li><a href="{{route('comments.index')}}"><i class="fa fa-fw fa-link"></i> Yorumlar</a></li>
            <li><a href="{{route('aboutme.index')}}"><i class="fa fa-fw fa-link"></i> Hakkımda</a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->mode == 1)
                <li><a href="{{route('users.index')}}"><i class="fa fa-fw fa-link"></i> Kullanıcılar</a></li>
            @endif
            <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-link"></i> Expandable Menu Item
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="content p-4">
        @yield('content')
    </div>
</div>

<script src="/adminpanel/js/jquery.min.js"></script>
<script src="/adminpanel/js/bootstrap.bundle.min.js"></script>
<script src="/adminpanel/js/bootadmin.min.js"></script>
@yield('js')

</body>
</html>