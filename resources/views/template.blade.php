<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Renda - clean blog theme based on Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="/main/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="/main/css/jquery.bxslider.css" rel="stylesheet">
    <link href="/main/css/style.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('home.index')}}">Anasayfa</a></li>
                <li><a href="{{route('about.show', 2)}}">Hakkımda</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-reddit"></i></a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <header>
        <a href="index.html"><img src="/main/images/logo.png"></a>
    </header>
    <section class="main-slider">
        <ul class="bxslider">
            @php
                $sliders = \App\Text::where('slider', 1)->get();
            @endphp
            @foreach($sliders as $slider)
                <li><div class="slider-item"><img style="height: 500px; width: 1140px;" src="{{asset('uploads/images/'.$slider->image)}}" title="" /><h2><a href="{{route('post.show', $slider->id)}}" title="Vintage-Inspired Finds for Your Home">{{$slider->title}}</a></h2></div></li>
            @endforeach
        </ul>
    </section>
    <section>
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4 sidebar-gutter">
                <aside>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Kategoriler</h3>
                            <div class="widget-container">
                                <ul>
                                    @php
                                        $categories = \App\Category::all()
                                    @endphp
                                    @foreach($categories as $category)
                                    <li><a href="{{route('categoriespost.show', $category->id)}}">{{$category->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <h3 class="sidebar-title">Öne Çıkanlar</h3>
                        @php
                            $featuredPosts = \App\Text::orderby('clicked', 'desc')->take(5)->get();
                        @endphp
                        @foreach($featuredPosts as $featuredPost)
                            <div class="widget-container">
                                <article class="widget-post">
                                    <div class="post-image">
                                        <a href="{{route('post.show', $featuredPost->id)}}"><img style="height: 60px; width: 90px;" src="{{asset('uploads/images/'.$featuredPost->image)}}" alt=""></a>
                                    </div>
                                    <div class="post-body">
                                        <h2><a href="{{route('post.show', $featuredPost->id)}}">{{$featuredPost->title}}</a></h2>
                                        <div class="post-meta">
                                            <span><i class="fa fa-clock-o"></i> {{$featuredPost->created_at}}</span> <span><a href=""><i class="fa fa-comment-o"></i> 23</a></span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Hakkımda</h3>
                        @php
                            $admin = \App\User::find(2);
                        @endphp
                        <div class="widget-container widget-about">
                            <a href="{{route('about.show', 2)}}"><img src="{{asset('/uploads/profiles/'.$admin->image)}}" class="center-block img-circle" style="width: 90px; height: 90px; " alt=""></a>
                            <h4>{{$admin->name}}</h4>
                            <div class="author-title">{{$admin->job}}</div>
                            <p>
                                {!! strip_tags($admin->about_me) !!}
                            </p>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <div class="widget-container">
                            <div class="widget-socials">
                                <a href="{{$admin->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{$admin->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="{{$admin->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="{{$admin->github}}" target="_blank"><i class="fa fa-github"></i></a>
                                <a href="{{$admin->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$admin->google}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a href="{{$admin->reddit}}" target="_blank"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>
</div><!-- /.container -->

<footer class="footer">
    <div class="footer-socials">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-reddit"></i></a>
    </div>
    <div class="footer-bottom">
        <i class="fa fa-copyright"></i> Copyright 2015. All rights reserved.<br>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/main/js/bootstrap.min.js"></script>
<script src="/main/js/jquery.bxslider.js"></script>
<script src="/main/js/mooz.scripts.min.js"></script>
@yield('js')

</body>
</html>