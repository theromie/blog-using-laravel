@extends('app')
@section('title', 'About : Blog Using Laravel')
@section('content')

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/about-bg.png') }}'); margin-bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h2>About {{ $data['fullname'] }}</h2>
                    <hr class="small">
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p style="text-align:justify">Howdy! I'm Romil Kiran Lodaya and I am a Website and Application Developer based in Mumbai, India. I'm a guy with a passion for technology & innovation. I have always been into everything involving tech ever since I was little.</p>
            <p style="text-align:justify">When I am free, I spend my time exploring the world, playing sports, travelling, watching movies and listening to music. Enough Said. Want to hire me?</p>
            <p class="text-info">{{ $data['email'] }}</p>
        </div>
    </div>
</div>

@endsection