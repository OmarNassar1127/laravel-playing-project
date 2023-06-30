@extends('../layouts.app', ['title' => "Create post"])

@section('content')
<div>
  {{-- <form action="/posts" method="POST"> --}}
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostController@store' ]) !!}
    @csrf

    <div class="form-group">

      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class' => 'form-controll']) !!}
      <br>
      {!! Form::label('body', 'Body:') !!}
      {!! Form::text('body', null, ['class' => 'form-controll']) !!}
      <br>
      {!! Form::submit('Create Post', ['class'=> 'btn btn-primary'])!!}
      {!! Form::close() !!}
    </div>


    {{-- <input type="text" name="title" placeholder="Enter title">
    <input type="text" name="body" placeholder="Enter body content here"> --}}
    {{-- <input type="submit"> --}}
  {{-- </form> --}}
</div>
@endsection
@section('footer')
@endsection