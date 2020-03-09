@extends('layouts.app')

@section('content')
    @if(count($errors))
        <ul>
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </div>
        </ul>
        @endif

    {!! Form::open(['method'=>'post','action'=>'PostsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file','image') !!}
        {!! Form::file('file',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('ذخیره',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{--<form method="post" action="/posts">
        @csrf
        <input type="text" name="title" placeholder="enter your title"><br><br>
        <textarea name="body" id="" cols="30" rows="10" placeholder="enter your body"></textarea><br>
        <button>send</button>
    </form>--}}
    @endsection


