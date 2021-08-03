@extends('layout')

@section('content')

    <h1>List of Post</h1>

    <ul>
        @forelse ($posts as $post)
            <li>
                <h3><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->title }}</a></h3>
                <p>{{ $post->content }}</p>
                <em>{{ $post->created_at }}</em>
                <a href="{{ route('posts.edit', ['post'=>$post->id]) }}">Edit</a>
                
                <form method="POST" action="{{ route('posts.destroy',['post'=>$post->id ]) }}">
                    @csrf
                    @method('DELETE')
                
                    <button type="submit" >Delete Post</button>
                </form>

            </li>
        @endforeach

        @empty($posts)
            <p>No Posts</p>
        @endempty
    </ul>
        
    

    
@endsection