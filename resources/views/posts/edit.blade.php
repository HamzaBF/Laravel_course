@extends('layout')

@section('content')

<form method="POST" action="{{ route('posts.update',['post'=>$post->id ]) }}">
    @csrf
    @method('PUT')
    
    @include('posts.form')

    <button type="submit" >Update Post</button>
</form>




    
@endsection