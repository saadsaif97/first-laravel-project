@extends('app')

@section('title', 'Customers')

@section('content')


   <h1>Customers</h1>

   <a href="/customer/create" style="margin-bottom:10px">Create new customer</a>
   <a href="/customer?active=1">Active</a>
   <a href="/customer?active=0">Inactive</a>

   <ul>
      @forelse($customers as $customer)
         <li style='margin: 10px 0;'><strong><a href="/customer/{{ $customer->id }}"> {{ $customer->name }}</a></strong> | 
         {{ $customer->email }} | 
         <a href="/customer/{{ $customer->id }}/edit">Edit</a>
         <form action="/customer/{{ $customer->id }}" method="post" style="display: inline-block;">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
         </form>
         </li>
      @empty
         <li>No customer yet</li>
      @endforelse
   </ul>
@endsection