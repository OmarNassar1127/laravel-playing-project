@extends('../layouts.app', ['title' => "Edit post"])

@section('content')
<h1>Edit post</h1>
<div>
  <form action="/posts/{{$post->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{$post->title}}">
    <input type="text" name="body" value="{{$post->body}}">
    <input type="submit" value="Update">
  </form>
  <form action="/posts/{{$post->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="Delete">
  </form>
</div>
@endsection

@section('footer')
@endsection