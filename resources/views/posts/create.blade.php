@extends('../layouts.app', ['title' => "Create post"])

@section('content')
<div>
  {{-- <form action="/posts" method="POST"> --}}
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostController@store', 'files' => true ]) !!}
    @csrf

    <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class' => 'form-controll']) !!}
      <br>
      {!! Form::label('body', 'Body:') !!}
      {!! Form::text('body', null, ['class' => 'form-controll']) !!}
      <BR>
      {!! Form::file('file', null, ['class' => 'form-controll']) !!}
      <br>
      {!! Form::submit('Create Post', ['class'=> 'btn btn-primary'])!!}
      {!! Form::close() !!}
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <ul>
                <li>{{$error}}</li>
              </ul>
          @endforeach
        </div>
    @endif


    {{-- <input type="text" name="title" placeholder="Enter title">
    <input type="text" name="body" placeholder="Enter body content here"> --}}
    {{-- <input type="submit"> --}}
  {{-- </form> --}}
</div>
@endsection
@section('footer')
@endsection