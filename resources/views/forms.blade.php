@include('inner-blade')
<form action="/userForm" method="POST">
    {{-- Without @csrf we get 419 error code. Remember csrf is for Cross site request forgery --}}
    @csrf 
    <input type="text" name="username" value="{{old('username')}}" placeholder="Enter User Id"><br>
    <span style="color: red">@error('username'){{$message}}@enderror</span>
    <br>
    <input type="password" name="userPassword" value="{{old('userPassword')}}" placeholder="Enter user Password"><br>
    <span style="color: red">@error('userPassword'){{$message}}@enderror</span>
    <br>
    <button type="submit">Login</button>
</form>