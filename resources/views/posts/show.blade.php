@extends('layout')

@section('content')




        <h3>{{ $post->title }}</a></h3>
        <p>{{ $post->content }}</p>
        <em>{{ $post->created_at->diffforhumans() }}</em>
        <p> Statut : 
                @if ($post->active)
                        Enabled
                @else
                    desabled
                @endif
        </p>




    
@endsection