@extends('layouts.app')

@section('content')
    <h2><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h2><br><br>
    <h4>{{$post->body}}</h4>
    @endsection