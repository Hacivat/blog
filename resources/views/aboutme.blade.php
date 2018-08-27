<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/main/favicon.ico">
    <title>Renda - clean blog theme based on Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="/main/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="/main/css/jquery.bxslider.css" rel="stylesheet">
    <link href="/main/css/style.css" rel="stylesheet">

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
                <li><a href="{{route('home.index')}}">Anasayfa</a></li>
                <li class="active"><a href="{{route('about.show', 2)}}">Hakkımda</a></li>
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
        <a href="" ><img  src="{{asset('/uploads/profiles/'.$user->image)}}" class="img-circle" style="height: 90px; width:90px; "></a>
    </header>
    <section>
        <div class="row">
            <div class="col-md-12">
                <article class="blog-post">
                    <div class="blog-post-body">
                        <h2><a href="">{{$user->name}} Hakkında...</a></h2>
                        <div class="author-title">{{$user->job}}</div>
                        <div class="blog-post-text">
                            {!! $user->about_me !!}

                            <div class="widget-socials">
                                <a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="{{$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="{{$user->github}}" target="_blank"><i class="fa fa-github"></i></a>
                                <a href="{{$user->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$user->google}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a href="{{$user->reddit}}" target="_blank"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
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
</body>
</html>