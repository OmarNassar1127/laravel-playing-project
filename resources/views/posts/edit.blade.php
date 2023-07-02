@extends('../layouts.app', ['title' => "Edit post"])

@section('content')
<h1>Edit post</h1>
<div>


  {{-- <form action="/posts/{{$post->id}}" method="POST"> --}}
        {{-- <input type="text" name="title" value="{{$post->title}}">
    <input type="text" name="body" value="{{$post->body}}"> --}}
    {{-- <input type="submit" value="Update">
  </form> --}}
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostController@update', $post->id], 'enctype' => 'multipart/form-data']) !!}
      @csrf
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
      <br>
      {!! Form::label('body', 'Body:') !!}
      {!! Form::text('body', null, ['class' => 'form-control']) !!} 
      <br>
      {!! Form::label('file', 'File:') !!}
      {!! Form::file('file', ['class' => 'form-control']) !!}
      <br>
      @if (!empty($post->path))
          <p>Current File: {{$post->path}}</p>
      @else
          <p>No file attached</p>
      @endif
      <br>
      {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}





  {{-- <form action="/posts/{{$post->id}}" method="POST">
    @csrf --}}
    {{-- <input type="hidden" name="_method" value="DELETE">
         <input type="submit" value="Delete">
  </form> --}}
  {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
    @csrf
    {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger'])!!}
    {!! Form::close() !!}

</div>
@endsection

@section('footer')
@endsection