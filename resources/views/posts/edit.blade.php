@extends('app')
@section('title', 'Edit Post : Blog Using Laravel')
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('components/img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Edit Post</h1>                    
                    <hr class="small">
                    <span class="subheading">Laravel 5.2 Test Blog</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<div class="container">
    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-lg-8">            
            <div class="panel">
                <div class="panel-body">                                        
                    <div class="col-xs-12">                     
                        {{ Form::label('title', 'Title:', array('style' => 'font-weight:400;'))}}
                        {{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255', 'autofocus')) }}

                        {{ Form::label('slug', 'Slug:', array('style' => 'font-weight:400;'))}}
                        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

                        {{ Form::label('category_id', 'Category:', array('style' => 'font-weight:500;margin-top:20px;')) }}
                        {{ Form::select('category_id', $categories, null, array('class' => 'form-control', 'required' => '')) }}

                        {{ Form::label('tags', 'Tag:', array('style' => 'font-weight:500;margin-top:20px;')) }}
                        {{ Form::select('tags[]', $tags, null, array('class' => 'form-control js-example-basic-multiple', 'required' => '', 'multiple' => 'multiple')) }}

                        {{ Form::label('body', 'Post Body:', array('style' => 'font-weight:400;margin-top:20px;')) }}
                        {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'style' => 'resize:none;')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr/>
                <div class="row text-center">
                    <div class="col-xs-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger')) !!}
                    </div>
                    <div class="col-xs-6">
                        {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block'))}}
                    </div>
                </div>
            </div>
        </div>
        {!!  Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2().val({{ $post->tags()->getRelatedIds() }}).trigger('change');
    </script>

@endsection