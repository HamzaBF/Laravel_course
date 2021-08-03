<div>
    <label for="title">Title</label>
    <input name="title" type="text" value="{{ old('title',$post->title) ?? null}}">
</div>

<div>
    <label for="content">Content</label>
    <input name="content" type="text" value="{{ old('content',$post->content) ?? null}}">
</div>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>
        
        @endforeach
    </ul>
@endif