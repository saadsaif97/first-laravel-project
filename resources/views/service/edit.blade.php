@extends('app')

@section('title', 'Edit Service')

@section('content')

   <h3>Edit service:</h3>

   <form action="/service/{{ $service->id }}" method="post">
      @method('patch')
      @csrf
      <input type="text" autocomplete="false" name="name" value="{{ $service->name }}">
      <button type="submit">Update</button>
   </form>

   <p style="color: orangered;"> @error('name') {{ $message }} @enderror </p>

   <p><a href="/service"> < Back</a></p>
@endsection