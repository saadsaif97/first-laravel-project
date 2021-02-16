@extends('app')

@section('title', 'Services')

@section('content')

   <form action="/service" method="post">
      <input type="text" autocomplete="false" name="name">
      @csrf
      <button type="submit">Create</button>
   </form>

   <p style="color: orangered;"> @error('name') {{ $message }} @enderror </p>

   <h1>Services</h1>
   <ul>
      <li>Ding</li>
      <li>Dong</li>
      <li>DING Dong</li>
   </ul>
   <ul>

   <h2>New Services</h2>
   @forelse ($services as $service)
      <li> {{ $service->name }} </li>
   @empty
      <li>No services yet</li>
   @endforelse
   </ul>
@endsection
