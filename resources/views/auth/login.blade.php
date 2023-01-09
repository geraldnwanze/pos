<h1>login page</h1>

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button>login</button>
</form>

<x-alert />
