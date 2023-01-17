@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Profile</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> My Profile</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="tel" class="form-control" name="phone" value="{{ auth()->user()->phone }}" readonly>
										</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" readonly>
                                        </div>
                                    </div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection