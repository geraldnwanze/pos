<h1>edit users</h1>

<form action="{{ route('dashboard.admin.users.update', $user->id) }}" method="post">
    @csrf
    @method('PATCH')
    <select name="role" id="">
        <option value="{{ $user->role }}">{{ $user->role }}</option>
        @forelse ($roles as $role)
            <option value="{{ $role }}">{{ $role }}</option>
        @empty
            <option value="">no data available</option>
        @endforelse
    </select>

    <input type="text" name="name" placeholder="name" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="email" value="{{ $user->email }}">
    <input type="text" name="phone" placeholder="phone" value="{{ $user->phone }}">
    <input type="text" name="username" placeholder="username" value="{{ $user->username }}">
    <button>update</button>
</form>

<x-alert />