@extends('../layouts.app', ['title' => "Create post"])

@section('content')
<div>
  <form action="/posts" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Enter title">
    <input type="text" name="body" placeholder="Enter body content here">
    <input type="submit">
  </form>
</div>
@endsection
@section('footer')
@endsection