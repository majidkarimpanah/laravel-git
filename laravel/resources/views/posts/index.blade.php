@extends('layouts.app')

@section('content')
<ul>
    @foreach($posts as $post)
        <div>
            <li style="padding: 5px;display: inline-block;"><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></li>
            <a class="btn" href="{{route('posts.edit',$post->id)}}">ویرایش</a>
            <img src="{{$post->path}}" style="height: 50px" alt="">
            <span>{{$post->user->name}}</span>
        </div>
        @endforeach
</ul>
    @endsection