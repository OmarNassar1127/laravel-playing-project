@extends('../layouts.app', ['title' => "Index page"])

@section('content')
<h1>Hello from the index Page</h1>
  <ul>
    @foreach ($posts as $post)
    <div>
      <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
    </div>
    @endforeach
  </ul>
@endsection

@section('footer')
@endsection