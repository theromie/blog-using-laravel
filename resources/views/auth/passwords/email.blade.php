@extends('app')
@section('title', 'Forgot Password : Blog Using Laravel')
@section('content')
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}'); min-height:550px;">
    <div class="container">
        <div class="row">        
            <div class="col-lg-4 col-lg-offset-4" style="margin-top:120px;">                   
                <h3 class="text-center" style="color:#FFF;">Reset Password</h3>
                <div class="auth">   
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif             
                    {!! Form::open(['url' => 'password/email', 'method' => "post"]) !!}                        

                        {{ Form::label('email', 'Email:')}}
                        {{ Form::email('email', null, ['class' => 'form-control', 'autofocus']) }}
                    
                        <br/>
                        {{ Form::submit('Reset Password', array('class' => 'btn btn-primary btn-block')) }}
                    {!! Form::close() !!}

                    <div class="text-center" style="margin-top:20px;"><h5><a href="register" class="text-primary">Register</a></h5></div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection