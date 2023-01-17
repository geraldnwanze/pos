@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-success">
                    <h4 class="card-title">{{ $page }}</h4>
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary pull-right">create user</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>role</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>username</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $loop->index }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>
                                        <button form="toggle-status-{{ $user->id }}" class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}"><i class="fa {{ $user->active ? 'fa-times' : 'fa-check' }}"></i></button>
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                                        <button form="reset-password-{{ $user->id }}" class="btn btn-sm btn-primary"><i class="icon-refresh"></i></button>
                                        <button form="delete-user-{{ $user->id }}" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                    </td>
                                    <form action="{{ route('dashboard.users.toggle-status', $user->id) }}" method="post" id="toggle-status-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')    
                                    </form>
                                    <form action="{{ route('dashboard.users.reset-password', $user->id) }}" method="post" id="reset-password-{{ $user->id }}">
                                    @csrf
                                    @method('PATCH')
                                    </form>
                                    <form action="{{ route('dashboard.users.delete', $user->id) }}" method="post" id="delete-user-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">no data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection