@extends('vendor.master')
@section('mainBody')
<body class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-12 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<img src="{{asset('backend')}}/assets/images/logo-img.png" alt="" width="180">
										</div>
										<h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
										<p class="text-muted">We received your reset password request. Please enter your new password!</p>
										<form action="{{route('vendor.update.password')}}" method="post">
                                            @csrf
                                            <div class="mb-3 mt-5">
                                                <label class="form-label">Old Password</label>
                                                <input type="text" name="oldPassword" class="form-control" placeholder="Enter old password">
                                            </div>
                                            <div class="mb-3 mt-5">
                                                <label class="form-label">New Password</label>
                                                <input type="text" name="newPassword" class="form-control" placeholder="Enter new password">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="text" name="confirmPassword" class="form-control" placeholder="Confirm password">
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Change Password</button> <a href="{{route('vendor.login')}}" class="btn btn-light"><i class="bx bx-arrow-back mr-1"></i>Back to Login</a>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->


</body>

@endsection