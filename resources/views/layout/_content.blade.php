<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		@if(session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
	
		@if(session()->has('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('error') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

		<!--begin::Col-->
		<div class="col-xl-6">

			@include('partials/widgets/charts/_widget-1')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3">

			@include('partials/widgets/charts/_widget-2')
			<!--begin::Col-->
			<div class="col-xl-12 mt-7">
	
				@include('partials/widgets/charts/_widget-4')
	
			</div>
			<!--end::Col-->

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3">

			@include('partials/widgets/charts/_widget-3')
			<!--begin::Col-->
			<div class="col-xl-12 mt-7">
	
				@include('partials/widgets/charts/_widget-5')
	
			</div>
			<!--end::Col-->

		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/charts/_widget-6')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/charts/_widget-7')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/charts/_widget-8')

		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/charts/_widget-9')

		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-12">

			@include('partials/widgets/tables/_widget-8')
			
		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-4 mt-n1">
			
			@include('partials/widgets/lists/_widget-5')
			
		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-4 mt-n1">

			@include('partials/widgets/tables/_widget-7')
			
		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-4 mt-n1">

			@include('partials/widgets/tables/_widget-6')

		</div>

	</div>
	<!--end::Row-->

	

	<!--begin::Row-->
	<div class="row gy-5 my-n8 g-xl-1">
		@include('partials/widgets/tables/_widget-9')
		@include('partials/widgets/tables/_widget-11')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->