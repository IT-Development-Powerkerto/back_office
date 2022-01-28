<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Evaluation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
								<!--begin::Page title-->
								@include('layout/header/_base')


								@include('layout/_toolbar')
							</div>
							<!--end::Wrapper-->
							<!--begin::User-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									{{--  Image pict header  --}}
									@if(is_null(Auth()->user()->image))
									<img src="/assets/img/default.jpg" alt="" />
									@else
									<img src="{{ url('') }}/{{ Auth()->user()->image }}" alt="image" />
									@endif
								</div>

								@include('layout/topbar/partials/_user-menu')

								<!--end::Menu wrapper-->
							</div>
							<!--end::User -->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Routine Evaluation</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="" method="POST">
										@csrf
                                        
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputProduct" class="col-form-label">Product Name</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <select name="product_name" id="product_name" class="form-control form-control-solid text-muted">
                                                    <option hidden>Select Product</option>
                                                    <option value="All" required>All</option>
                                                    @foreach ($product as $product)
                                                        <option value="{{$product->name}}" required>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
											</div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputDate" class="col-form-label">Date</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control form-control-solid text-muted" name="date_filter" id="date_filter" type="date" onchange="submit()">
											</div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputtime" class="col-form-label">Time</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control form-control-solid text-muted" name="date_filter"  id="date_filter" type="time" onchange="submit()">
											</div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputResistance" class="col-form-label">Resistance</label>
                                            </div>
                                            <div class="col-10">
                                                <textarea value="" name="resistance" id="resistance" class="form-control form-control-solid"></textarea>
											</div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputSolution" class="col-form-label">Solution</label>
											</div>
											<div class="col-10">
												<textarea value="" name="solution" id="solution" class="form-control form-control-solid"></textarea>
											</div>
										</div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Save">
									</form>
								</div>
								<!--end::Card body-->

								<!--begin::Tables Widget 9-->
								<div class="card card-l-stretch mb-5 mb-xl-8 scroll scroll-pull mt-6" data-scroll="true" data-wheel-propagation="true">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bolder fs-3 mb-1">Routine Evaluation Log</span>
											    <span class="text-muted mt-1 fw-bold fs-7">1 Data</span>
										</h3>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
									<div class="card-body py-3">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
												<!--begin::Table head-->
												<thead>
													<tr class="fw-bolder text-muted">
														<th class="min-w-100px">No</th>
														<th class="min-w-100px">Product</th>
														<th class="min-w-100px">Date</th>
														<th class="min-w-100px">Time</th>
                                                        <th class="min-w-200px">Resistance</th>
														<th class="min-w-200px">Solution</th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <h1 class="text-dark fw-normal fs-6">1</h1>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h1 class="text-dark fw-normal fs-6">Generos</h1>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h1 class="text-dark fw-normal fs-6">26/01/2022</h1>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h1 class="text-dark fw-normal fs-6">09:50</h1>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h1 class="text-dark fw-normal fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing</h1>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h1 class="text-dark fw-normal fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing</h1>
                                                            </div>
                                                        </td>
                                                    </tr>
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table container-->
									</div>
									<!--begin::Body-->
								</div>
								<!--end::Tables Widget 9-->
							</div>
							<!--end::details View-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Page-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="https://powerkerto.com" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Powerkerto</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<script>
			var avatar1 = new KTImageInput('kt_image_1');
		</script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
