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
                    <h1>Edit Comment</h1>                    
                    <hr class="small">
                    <span class="subheading">Laravel 5.2 Test Blog</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<div class="container">
    <div class="row">
        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
        <div class="col-lg-8">            
            <div class="panel">
                <div class="panel-body">                                        
                    <div class="col-xs-12">                     
                        {{ Form::label('name', 'Name:', array('style' => 'font-weight:400;'))}}
                        {{ Form::text('name', null, array('class' => 'form-control', 'disabled' => '')) }}

                        {{ Form::label('email', 'Title:', array('style' => 'font-weight:400; padding-top:20px;'))}}
                        {{ Form::text('email', null, array('class' => 'form-control', 'disabled' => '')) }}

                        {{ Form::label('comment', 'Commment:', array('style' => 'font-weight:400; padding-top:20px;'))}}
                        {{ Form::textarea('comment', null, array('class' => 'form-control', 'row' => '5')) }}                        
                        
                        {{ Form::submit('Update Comment', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;'))}}
                    </div>
                </div>
            </div>
        </div>        
        {{ Form::close() }}    
    </div>
</div>

@endsection
