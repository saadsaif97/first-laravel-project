@csrf
<div>
   <label for="name">Name</label>
   <input type="text" name="name" id="name" outocomplete="false" value="{{ old('name') ?? $customer->name }}">
   <p style="color:orangered">@error('name') {{ $message }} @enderror</p>
</div>
<div>
   <label for="email">Email</label>
   <input type="text" name="email" id="email" outocomplete="false" value="{{ old('email') ?? $customer->email }}">
   <p style="color:orangered">@error('email') {{ $message }} @enderror</p>
</div>
<div>
   <a href="/customer"> < Back</a>
   <input type="submit" value="Save">
</div>
