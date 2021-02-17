@extends('app')

@section('title', 'Create Service')

@section('content')

   <h3>Create new service:</h3>

   <form action="/service" method="post">
      @csrf
      <input type="text" autocomplete="false" name="name" value="{{ old('name') }}">
      <button type="submit">Create</button>
   </form>

   <p style="color: orangered;"> @error('name') {{ $message }} @enderror </p>

   <p><a href="/service"> < Back</a></p>
@endsection