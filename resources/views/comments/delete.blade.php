@extends('app')
@section('title', 'Edit Comment : Blog Using Laravel')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Delete Comment</h1>                    
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
                    <h1>DELETE THIS COMMENT</h1>
                    <p>
                        <strong>Name:</strong> {{ $comment->name }}<br>
                        <strong>Email:</strong> {{ $comment->email }}<br>
                        <strong>Comment:</strong> {{ $comment->comment }}
                    </p>
                    {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                    
                        {{ Form::submit('YES DELETE COMMENT', array('class' => 'btn btn-danger', 'style' => 'margin-top:20px;'))}}

                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>         
    </div>
</div>

@endsection
