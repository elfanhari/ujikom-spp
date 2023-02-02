LOGIN ADMIN

<br>

@if (session()->has('info'))
    <p class="text-danger"> {{ session('info') }} </p>
@endif

<form action="{{ route('loginadmin.check') }}" method="POST">
@csrf

Username : <input type="text" name="username" id="abc"> <br>
Password : <input type="text" name="password" id="abc">

<button type="submit">LOGIN</button>

</form>