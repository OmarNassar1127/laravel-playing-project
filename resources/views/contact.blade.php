@extends('layouts.app', ['title' => "Contact page"])

@section('content')
    <h1>Contact page</h1>
@endsection
@section('footer')
{{-- <script>alert('Hello world')</script> --}}
<div>
    @if (count($people))
        @foreach ($people as $pepe)
            <ul>
                <li>{{$pepe}}</li>
            </ul>
        @endforeach  
    @else 
            <p>Sorry the array is empty</p>
    @endif
</div>
@endsection