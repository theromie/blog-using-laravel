@extends('app')
@section('title', 'Edit Tag : Blog Using Laravel')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Edit Tag</h1>                    
                    <hr class="small">
                    <span class="subheading">Laravel 5.2 Test Blog</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<div class="container">
    <div class="row">
        {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
        <div class="col-lg-8">            
            <div class="panel">
                <div class="panel-body">                                        
                    <div class="col-xs-12">                     
                        {{ Form::label('name', 'Title:', array('style' => 'font-weight:400;'))}}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'autofocus')) }}
                        
                        {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'style' => 'margin-top:20px;'))}}
                    </div>
                </div>
            </div>
        </div>        
        {!!  Form::close() !!}
    </div>
</div>

@endsection
