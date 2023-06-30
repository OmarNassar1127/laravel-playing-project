@extends('../layouts.app', ['title' => "Create post"])

@section('content')
<h1><a href="{{route('posts.edit', $post->id)}}">Title: {{$post->title}}</a></h1>
<h2>Body: {{$post->body}}</a></h2>
@endsection



@section('footer')
@endsection