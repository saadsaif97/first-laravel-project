@extends('app')

@section('title', 'Edit customer')

@section('content')


   <h1>Edit customer</h1>
   <form action="/customer/{{ $customer->id }}" method="post">
      @method('patch')

      @csrf
      <div>
         <label for="name">Name</label>
         <input type="text" name="name" id="name" outocomplete="false" value="{{ $customer->name }}">
         <p style="color:orangered">@error('name') {{ $message }} @enderror</p>
      </div>
      <div>
         <label for="email">Email</label>
         <input type="text" name="email" id="email" outocomplete="false" value="{{ $customer->email }}">
         <p style="color:orangered">@error('email') {{ $message }} @enderror</p>
      </div>
      <div>
         <input type="submit" value="Save">
      </div>
   </form>
   
@endsection