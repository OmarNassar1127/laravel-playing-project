@extends('../layouts.app', ['title' => "Index page"])

@section('content')
<h1>Hello from the index Page</h1>
  <ul>
    @foreach ($posts as $post)
    <div class="image-container">
    </div>
    <div>
      <li>
        <a href="{{route('posts.show', $post->id)}}">
          {{$post->title}}
        @if ($post->path === '/images/')
        <p>there's no image attached to this</p>
        @else
        <img src="{{$post->path}}" height="100" style="margin-left:5%;" alt="">
        @endif
        
        </a>
      </li>
      <br>
      
    </div>
    @endforeach
  </ul>
@endsection

@section('footer')
@endsection