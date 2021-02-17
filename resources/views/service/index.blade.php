@extends('app')

@section('title', 'Services')

@section('content')

   <a href="/service/create">Create new service</a>

   <h2>New Services</h2>

   <ul>
   @forelse ($services as $service)
      <li style="margin: 10px 0;">
         <a href="/service/{{ $service->id }}">{{ $service->name }}</a> 
         <a href="/service/{{ $service->id }}/edit" style="color: gray;">Edit</a>
         <form action="/service/{{ $service->id }}" method="post" style="display: inline-block;">
            @method('delete')
            @csrf
            <input type="submit" value="Delete">
         </form>
      </li>
   @empty
      <li>No services yet</li>
   @endforelse
   </ul>

@endsection
