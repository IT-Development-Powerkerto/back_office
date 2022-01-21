<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-5')
			
			
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-3')
			
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-4')

		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 mt-n20 g-xl-1">
		@include('manager/layout/ManagerContent')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->