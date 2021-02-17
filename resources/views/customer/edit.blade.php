@extends('app')

@section('title', 'Edit customer')

@section('content')


   <h1>Edit customer</h1>
   <form action="/customer/{{ $customer->id }}" method="post">
      @method('patch')

      @include('customer.form')
   </form>

   
@endsection