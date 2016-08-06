@extends('app')
@section('title', 'Register : Blog Using Laravel')
@section('content')
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}'); min-height:660px;">
    <div class="container">
        <div class="row">        
            <div class="col-lg-4 col-lg-offset-4" style="margin-top:110px;">
            @include('message')
            <h3 class="text-center" style="color:#FFF;">Register to My Blog</h3>            
                <div class="auth">
                    {!! Form::open() !!}

                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}

                        {{ Form::label('email', 'Email:')}}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'Password:')}}
                        {{ Form::password('password', ['class' => 'form-control'])}}                    

                        {{ Form::label('password_confirmation', 'Confirm Password:')}}
                        {{ Form::password('password_confirmation', ['class' => 'form-control'])}}                    
        
                        <br/>
                        {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}
                        
                    {!! Form::close() !!}
                    <div class="text-center" style="margin-top:20px;"><h5><a href="login" class="text-primary">Already have account[?]</a></h5></div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection