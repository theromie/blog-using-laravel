@extends('app')
@section('title', 'Login : Blog Using Laravel')
@section('content')
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}'); min-height:550px;">
    <div class="container">
        <div class="row">        
            <div class="col-lg-4 col-lg-offset-4" style="margin-top:120px;">   
                @include('message')         
                <h3 class="text-center" style="color:#FFF;">Login to My Blog</h3>
                <div class="auth">                
                    {!! Form::open() !!}

                        {{ Form::label('email', 'Email:')}}
                        {{ Form::email('email', null, ['class' => 'form-control', 'autofocus']) }}

                        {{ Form::label('password', 'Password:')}}
                        {{ Form::password('password', ['class' => 'form-control'])}}
                         
                        <br/>               
                        {{ Form::checkbox('remember') }}&nbsp;{{ Form::label('remeber', 'Remember Me')}}

                        <br/>
                        {{ Form::submit('Login', array('class' => 'btn btn-primary btn-block')) }}
                    {!! Form::close() !!}

                    <div class="text-center" style="margin-top:20px;"><h5><a href="register" class="text-primary">Register</a></h5></div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection