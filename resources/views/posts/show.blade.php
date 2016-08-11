@extends('app')
@section('title', 'View Post : Blog Using Laravel')
@section('content')

<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h4>{{ $post->title }}</h4>                    
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
                        	{!! $post->body !!}
                    	</h5>
                    	@foreach($post->tags as $tag)
                    		<span class="label label-warning">{{ $tag->name }}</span>
                    	@endforeach                    	
			    	</div>
			  	</div>
			</div>
			<div class="backend-comment">
        		<h3>Comments ({{ $post->comments()->count() }})</h3><hr/>
        		<table class="table table-striped text-center">
                <thead>
                    <tr>                      
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>                        
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        	</div>			
			<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< See All Post</a>	
			<div class="clearfix"></div>
		</div>
		<div class="col-lg-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
        			<h6><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></h6>
				</dl>
				<dl class="dl-horizontal">
					<label>Category:</label>
        			<h6>{{ $post->category->name }}</a></h6>
				</dl>				
				<dl class="dl-horizontal">
					<label>Created At:</label>
        			<h6>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</h6>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
        			<h6>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</h6>
				</dl>
				<hr/>
				<div class="row text-center">
					<div class="col-xs-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary')) !!}
					</div>
					<div class="col-xs-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
