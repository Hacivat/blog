@extends('template')

@section('content')
    @foreach($texts as $text)
        <article class="blog-post">
            <div class="blog-post-image">
                <a href="post.html"><img src="images/750x500-1.jpg" alt=""></a>
            </div>
            <div class="blog-post-body">
                <h2><a href="{{route('post.show', $text->id)}}">{{$text->title}}</a></h2>
                <div class="post-meta"><span>by <a href="{{route('about.show', $text->isAuthor->id)}}">{{$text->isAuthor->name}}</a></span>/<span><i class="fa fa-clock-o"></i>{{$text->created_at}}</span>/<span><i class="fa fa-pencil-square"></i>{{$text->isCategory->title}}</span>/<span><i class="fa fa-comment-o"></i> <a href="{{route('post.show', $text->id)}}">{{count($text->isComments)}}</a></span></div>
                <p>{!! str_limit(strip_tags($text->content), 300)  !!}</p>
                <div class="read-more"><a href="{{route('post.show', $text->id)}}">okumaya devam et...</a></div>
            </div>
        </article>
        @endforeach
    <div class="text-center">{{$texts->links()}}</div>
@endsection

@section('css')
@endsection

@section('js')
@endsection