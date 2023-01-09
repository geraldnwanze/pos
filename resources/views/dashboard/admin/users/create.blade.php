<h1>Create new user</h1>

<form action="{{ route('dashboard.admin.users.store') }}" method="post">
    @csrf
    <select name="role" id="">
        <option value="">select a role</option>
        @forelse ($roles as $role)
            <option value="{{ $role }}">{{ $role }}</option>
        @empty
            <option value="">no data available</option>
        @endforelse
    </select>

    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="text" name="phone" placeholder="phone">
    <input type="text" name="username" placeholder="username">
    <button>create</button>
</form>

<x-alert />