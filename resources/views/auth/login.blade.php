<h1>login page</h1>

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button>login</button>
</form>

@error('error')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
