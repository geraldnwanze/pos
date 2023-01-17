@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Create a new user</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="{{ route('dashboard.users.store') }}" method="POST">
                            @csrf
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> New User Data</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="role">Role</label>
											<select name="role" class="form-control">
                                                <option value="">select role</option>
                                                @forelse ($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @empty
                                                    <option value="">no data available</option>
                                                @endforelse
                                            </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" name="name" value="{{ old('name') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
										</div>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                </div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-success">
									<i class="ft-save"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection