@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Settings</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="POST" action="{{ route('dashboard.update-password', auth()->user()->id) }}">
                            @csrf
                            @method('PATCH')
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i>Update Password</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="name">Current Password</label>
											<input type="password" class="form-control" name="current_password" required>
										</div>
									</div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="new password">New Password</label>
											<input type="password" class="form-control" name="password" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="confirm password">Confirm Password</label>
											<input type="password" class="form-control" name="password_confirmation" required>
										</div>
									</div>
								</div>
							</div>
                            <div class="form-actions">
								<button type="submit" class="btn btn-success">
									<i class="ft-save"></i> Update
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection