@extends('app')

@section('title', 'Service Details')

@section('content')
   <hr>
   <h1>{{ $service->name }}</h1>
   <hr>

   <a href="/service" style="margin-bottom:10px"> < Back</a>

@endsection