@extends('app')
@section('title', 'All Posts : Blog Using Laravel')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Your Post</h1>
                    <hr class="small">
                    <span class="subheading">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </div>
</header>  	
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
        	<h1>Your Posts<span class="pull-right"><a href="{{ route('posts.create') }}" class="btn btn-info">Create New Post</a></span></h1>        	
            <table class="table table-striped">
                <thead>
                    <tr>                      
                      <th>Title</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>                        
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 0, 50) }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">View</a></td>     
                    </tr>
                    @endforeach
                </tbody>
            </table>        				
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>
</div>

@endsection