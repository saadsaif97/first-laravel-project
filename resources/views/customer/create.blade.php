@extends('app')

@section('title', 'Create new customer')

@section('content')


   <h1>Create new customers</h1>
   <form action="/customer" method="post">
      @csrf
      <div>
         <label for="name">Name</label>
         <input type="text" name="name" id="name" outocomplete="false" value="{{ old('name') }}">
         <p style="color:orangered">@error('name') {{ $message }} @enderror</p>
      </div>
      <div>
         <label for="email">Email</label>
         <input type="text" name="email" id="email" outocomplete="false" value="{{ old('email') }}">
         <p style="color:orangered">@error('email') {{ $message }} @enderror</p>
      </div>
      <div>
         <input type="submit" value="Create">
      </div>
   </form>
   
@endsection