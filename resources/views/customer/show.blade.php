@extends('app')

@section('title', 'Customer Details')

@section('content')
   <h1>Customer details</h1>

   <p><strong>Name:</strong> {{ $customer->id }}</p>
   <p><strong>Email:</strong> {{ $customer->email }}</p>
   <a href="/customer" style="margin-bottom:10px"> < Back</a>

@endsection