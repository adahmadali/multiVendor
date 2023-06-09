<!doctype html>
<html lang="en">

@include('vendor.includes.head')

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('vendor.includes.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('vendor.includes.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

					@yield('mainBody')

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('vendor.includes.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('vendor.includes.switcher')
	<!--end switcher-->
	@include('vendor.includes.js')
</body>

</html>