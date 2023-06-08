<!-- Bootstrap JS -->
<script src="{{asset('backend')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	
	<script src="{{asset('backend')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/jquery-knob/excanvas.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/jquery-knob/jquery.knob.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{asset('backend')}}/assets/js/index.js"></script>
	<!--app JS-->
	<script src="{{asset('backend')}}/assets/js/app.js"></script>


@if(Session::has('message'))
	<script>
	var type = "{{Session::get('type')}}";
	switch(type){
		case "info":
			toastr.info("{{ Session::get('message') }}");
			break;
		case "error":
			toastr.error("{{ Session::get('message') }}");
			break;
		case "warning":
			toastr.warning("{{ Session::get('message') }}");
			break;
		case "success":
			toastr.success("{{ Session::get('message') }}");
			break;
		
	}
	</script>
@endif

<script>
	jQuery(document).ready(function(){
		jQuery('.image').change('.image',function(){
			let reader = new FileReader();
			var file = document.querySelector('.image').files[0];
			reader.onload = function(e){
				jQuery('.imagePre').attr('src',e.target.result);
			}
			reader.readAsDataURL(file);
		});
	});


</script>






