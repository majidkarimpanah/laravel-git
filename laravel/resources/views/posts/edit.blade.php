@extends('layouts.app')

@section('content')
    @can('update',$post)
    {!! Form::model($post,['method'=>'Patch','action'=>['PostsController@update',$post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('body',$post->body,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('بروز رسانی',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($post,['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('حذف ',['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    @endcan
    {{--<form method="post" action="{{route('posts.update',$post->id)}}">
        @method('patch')
        @csrf
        <input type="text" name="title" value="{{$post->title}}"><br><br>
        <textarea name="body" cols="30" rows="10">{{$post->body}}</textarea><br>
        <button>send</button>
    </form>
    <br><br>
    <form method="post" action="{{route('posts.destroy',$post->id)}}">
        @method('delete')
        @csrf
        <button>delete</button>
    </form>--}}
@endsection