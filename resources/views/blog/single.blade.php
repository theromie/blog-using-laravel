@extends('app')
<?php $title = htmlspecialchars($post->title); ?>
@section('title', "$title | Blog Using Laravel")
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
                        	{{ $post->body }}
                    	</h5>
                        <hr/>
                        Posted In : <h4 class="label label-success">{{ $post->category->name }}</h4>
                        <h5>Tags :
                        @foreach($post->tags as $tag)
                            <span class="label label-warning">{{ $tag->name }}</span>
                        @endforeach</h5>
			    	</div>                    
			  	</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <h3><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ $post->comments()->count() }} Comments</h3><hr/>
                    @foreach($post->comments as $comment)                    
                    <div class="comments">
                        <div class="info">
                            <img  class="img-responsive img-circle" style="width:32px;" src={{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($comment->email))) ."?d=monsterid" }}>
                            <div class="name">
                                <h4>{{ $comment->name }}</h4>
                                <span class="text-muted time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</span>
                            </div>
                        </div>                        
                        <div class="content">{{ $comment->comment }}</div>                        
                    </div>
                    <hr/>
                    @endforeach    
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading"><h4>Post Comment</h4></div>
                <div class="panel-body">                    
                    <div class="col-xs-12">
                    {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('name', 'Name:', array('style' => 'font-weight:500;'))}}
                                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'autofocus')) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('email', 'Email:', array('style' => 'font-weight:500;'))}}
                                {{ Form::text('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'autofocus')) }}
                            </div>
                            <div class="col-md-12">
                                {{ Form::label('comment', 'Comment:', array('style' => 'font-weight:500;margin-top:20px;'))}}
                                {{ Form::textarea('comment', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'style' => 'resize:none;', 'rows' => '5', 'autofocus')) }}
                            </div>
                        </div>
                        {{ Form::submit('add comment', ['class' => 'btn btn-success btn-block', 'style' => 'font-weight:500;margin-top:20px;']) }}
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <a href="/" class="btn btn-default btn-block"><< See All Post</a>          
		</div>		
	</div>
</div>

@endsection

