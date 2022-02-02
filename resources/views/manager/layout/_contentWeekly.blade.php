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
		<!--begin::Wrapper-->
		<div class="d-flex align-items-center justify-content-between mt-n3 pb-1">
			<ul class="nav">
				<li class="nav-item">
					<h1 class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
						>Filter Dashboard</h1>
				</li>
			</ul>
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
						href="{{route('manager')}}">Daily</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light active fw-bold fs-7 px-4 me-1"
						href="#">Weekly</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4"
						href="{{ route ('Managermonthlydashboard') }}">Monthly</a>
				</li>
			</ul>
		</div>
		<!--end::Wrapper-->
			<!--begin::Col-->
            <div class="col-xl-6">

                @include('partials/widgets/WeeklyCharts/_widget-1')

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3">

                @include('partials/widgets/WeeklyCharts/_widget-2')
                <!--begin::Col-->
                <div class="col-xl-12 mt-7">

                    @include('partials/widgets/WeeklyCharts/_widget-4')

                </div>
                <!--end::Col-->

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3">

                @include('partials/widgets/WeeklyCharts/_widget-3')
                <!--begin::Col-->
                <div class="col-xl-12 mt-7">

                    @include('partials/widgets/WeeklyCharts/_widget-5')

                </div>
                <!--end::Col-->

            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-3 mt-n2">

                @include('partials/widgets/WeeklyCharts/_widget-6')

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3 mt-n2">

                @include('partials/widgets/WeeklyCharts/_widget-7')

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3 mt-n2">

                @include('partials/widgets/WeeklyCharts/_widget-8')

            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-3 mt-n2">

                @include('partials/widgets/WeeklyCharts/_widget-9')

            </div>
            <!--end::Col-->
	<!--begin::Row-->
	<div class="row gy-5 mt-n20 g-xl-1">
		@include('manager/layout/ManagerContent')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->