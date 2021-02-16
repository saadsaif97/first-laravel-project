@extends('app')

@section('title', 'Customers')

@section('content')
   <h1>Customers</h1>
   <a href="/customer/create" style="margin-bottom:10px">Create new customer</a>

   <ul>
      @forelse($customers as $customer)
         <li><strong>{{ $customer->name }}</strong> | {{ $customer->email }}</li>
      @empty
         <li>No customer yet</li>
      @endforelse
   </ul>
@endsection