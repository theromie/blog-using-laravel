@extends('app')
@section('title', "$tag->name Tag : Blog Using Laravel")
@section('content')

<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h4>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h4>                    
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
			@include('message')
			<div class="panel">
				<div class="panel-body">			    	
			    	<div class="col-xs-12">                    	
                    	<h5 class="post-subtitle" style="text-align:justify;line-height: 30px;">
                        	{{ $tag->name }} Tag
                    	</h5>                    	
			    	</div>
			  	</div>
			</div>						
		</div>
		<div class="col-lg-2 col-md-offset-2">			
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block">Edit</a>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">                    	     
            <table class="table table-striped">
                <thead>
                    <tr> 
                    	<th>#</th>                     
                      	<th>Title</th>
                      	<th>Tags</th>
                      	<th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                    <tr>                        
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                        	@foreach ($post->tags as $tag)
                        		<span class="label label-warning">{{ $tag->name }}</span>
                        	@endforeach
                        </td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a></td>     
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
</div>

@endsection
