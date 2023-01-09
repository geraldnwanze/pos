<h1>Users</h1>

<a href="{{ route('dashboard.admin.users.create') }}">create new user</a>

<h4>Owners</h4>
<table border="1">
    <thead>
        <tr>
            <th>sn</th>
            <th>name</th>
            <th>email</th>
            <th>username</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($owners as $owner)
            <tr>
                <td>1</td>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->email }}</td>
                <td>{{ $owner->username }}</td>
                <td>{{ $owner->active ? 'active' : 'inactive' }}</td>
                <td>
                    <button form="toggle-user-status-{{ $owner->id }}">{{ $owner->active ? 'deactivate' : 'activate' }}</button>
                </td>
                <form action="{{ $owner->active ? route('dashboard.admin.users.toggle-status', $owner->id) : route('dashboard.admin.users.toggle-status', $owner->id) }}" method="post" id="toggle-user-status-{{ $owner->id }}">
                @csrf
                @method('PATCH')
                </form>
            </tr>
        @empty
            <tr>
                <td colspan="100%">no data available</td>
            </tr>
        @endforelse
    </tbody>
</table>

<h4>Staffs</h4>
<table border="1">
    <thead>
        <tr>
            <th>sn</th>
            <th>name</th>
            <th>email</th>
            <th>username</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($staffs as $staff)
            <tr>
                <td>1</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->email }}</td>
                <td>{{ $staff->username }}</td>
                <td>{{ $staff->active ? 'active' : 'inactive'}}</td>
                <td>
                    <button form="toggle-user-status-{{ $staff->id }}">{{ $staff->active ? 'deactivate' : 'activate' }}</button>
                </td>
                <form action="{{ $staff->active ? route('dashboard.admin.users.toggle-status', $staff->id) : route('dashboard.admin.users.toggle-status', $staff->id) }}" method="post" id="toggle-user-status-{{ $staff->id }}">
                @csrf
                @method('PATCH')
                </form>
            </tr>
        @empty
            <tr>
                <td colspan="100%">no data available</td>
            </tr>
        @endforelse
    </tbody>
</table>