@extends('app')
@section('title', "$post->title | Blog Using Laravel")
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
            <a href="/" class="btn btn-default btn-block"><< See All Post</a>          
		</div>		
	</div>
</div>

@endsection
