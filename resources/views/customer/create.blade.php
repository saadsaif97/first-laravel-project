@extends('app')

@section('title', 'Create new customer')

@section('content')


   <h1>Create new customers</h1>
   <form action="/customer" method="post">
      @include('customer.form')
   </form>
   
@endsection
