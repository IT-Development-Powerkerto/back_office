<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/ceo/_widget-5')
			
			
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/ceo/_widget-3')
			
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/ceo/_widget-4')

		</div>
		<div class="d-flex align-items-center justify-content-between mt-n3 pb-1">
			<ul class="nav">
				<li class="nav-item">
					<h1 class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
						>Filter Dashboard</h1>
				</li>
			</ul>
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light active fw-bold fs-7 px-4 me-1"
						href="#">Daily</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
						href="{{ route ('CEOweeklydashboard') }}">Weekly</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4"
						href="{{ route ('CEOmonthlydashboard') }}">Monthly</a>
				</li>
			</ul>
		</div>
		<!--begin::Col-->
		<div class="col-xl-6 mt-n1">

			@include('partials/widgets/charts/_widget-1')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n1">

			@include('partials/widgets/charts/_widget-2')
			<!--begin::Col-->
			<div class="col-xl-12 mt-7">
	
				@include('partials/widgets/charts/_widget-4')
	
			</div>
			<!--end::Col-->

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n1">

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
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 mt-n20 g-xl-1">
		@include('ceo/layout/CEOContent')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->