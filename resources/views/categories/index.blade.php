@extends('app')
@section('title', 'All Categories : Blog Using Laravel')
@section('content')

<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>All Categories</h1>
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
        	<h1>All Category</h1>        	
            <table class="table table-striped">
                <thead>
                    <tr>           
                    	<th>#</th>
                      	<th>Name</th>                                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>     
                    	<td>{{ $category->id }}</td>                   
                        <td>{{ $category->name }}</td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>        				            
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(array('route' => 'categories.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}

                    <h2>New Category</h2>
                    {{ Form::label('name', 'Name:', array('style' => 'font-weight:500;'))}}
                    {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'autofocus')) }}                

                    {{ Form::submit('Create Category', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px; font-weight:400; padding:8px;'))}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
