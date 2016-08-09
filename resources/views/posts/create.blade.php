@extends('app')
@section('title', 'Create Article : Blog Using Laravel')
@section('content')

<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Create Post</h1>
                    <hr class="small">
                    <span class="subheading">Laravel 5.2 Test Blog</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			@include('message')
			<h2>Create New Post</h2>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}

			    {{ Form::label('title', 'Title:', array('style' => 'font-weight:500;'))}}
			    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'autofocus')) }}

			    {{ Form::label('slug', 'Slug:', array('style' => 'font-weight:500;margin-top:20px;'))}}
			    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

			    {{ Form::label('category_id', 'Category:', array('style' => 'font-weight:500;margin-top:20px;')) }}
			    <select class="form-control" name="category_id">
				    @foreach($categories as $category)
				    	<option value='{{ $category->id }}'>{{ $category->name }}</option>
				    @endforeach
			    </select>

			    {{ Form::label('body', 'Post Body:', array('style' => 'font-weight:500;margin-top:20px;'))}}
			    {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'style' => 'resize:none;'))}}

			    {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px; font-weight:400; padding:8px;'))}}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
