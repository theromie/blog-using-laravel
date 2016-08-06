@extends('app')
@section('title', 'Home : Blog Using Laravel')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>My First Blog</h1>
                    <hr class="small">
                    <span class="subheading">Laravel 5.2 Test Blog</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h1>All Posts</h1>
            @foreach ($posts as $post)
            <div class="panel" style="box-shadow: 0 5px 5px rgba(0,0,0,.1);">
                <div class="panel-body">
                    <div class="col-lg-4 col-xs-12">
                        <img src="{{ asset('components/img/home-bg.jpg') }}" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-xs-12 col-lg-8">
                        <a href="{{ url('blog/'.$post->slug) }}">
                            <h4 class="post-title" style="margin-top:5px; text-align:justify;">
                                {{ $post->title }}
                            </h4>
                        </a>
                        <h5 class="post-subtitle" style="line-height:20px;">
                            {{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}
                        </h5>
                        <h6 class="post-meta text-muted">Created On {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</h6>
                    </div>
                </div>
            </div>                
            @endforeach
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>  
        </div>
    </div>
</div>


@endsection