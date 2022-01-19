<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit Lead Tunelling</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link rel="icon" href="../img/favicon.png">
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
							<!--begin::Page title-->
							@include('layout/header/_base')


							@include('layout/_toolbar')
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Logo-->
								    <img alt="Logo" src="../img/logo.png" class="h-40px" />
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Toolbar wrapper-->
							<!--begin::User-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
									data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									@if(is_null(Auth()->user()->image))
									<img src="/assets/img/default.jpg" alt="" />
									@else
									<img src={{ Auth()->user()->image }} alt="image" />
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
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Edit Lead Tunelling</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form class="form" action="{{ route('lead.update',['lead' => $lead->implode('id')]) }}" method="POST">
										@csrf
										@method('PATCH')
										<div class="card-body">
											<h1 class="pb-5">Data CS</h1>
										 	<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Advertise</label>
												<div class="col-lg-3">
													<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-users-cog" style="font-size: 24px"></i></span></div>
														<label type="text" class="form-control" placeholder="Full name">{{ old('advertiser') ?? $lead->implode('advertiser') }}</label>
													</div>
													<span class="form-text text-muted">Please enter your full name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Operator</label>
												<div class="col-lg-3">
													<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user" style="font-size: 24px"></i></span></div>
														<label type="text" class="form-control" placeholder="your name">{{ old('operator') ?? $lead->implode('operator_name') }}</label>
													</div>
													<span class="form-text text-muted">Please enter your name</span>
												</div>
										  		<label class="col-lg-1 col-form-label text-lg-right">Status</label>
										  		<div class="col-lg-3">
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="option">
															<option value="3" {{ (old('status_id') ?? $lead->implode('status_id') ) == '3' ? 'selected': '' }} required>Waiting</option>
															<option value="4" {{ (old('status_id') ?? $lead->implode('status_id') ) == '4' ? 'selected': '' }} required>Proccessing</option>
															<option value="5" {{ (old('status_id') ?? $lead->implode('status_id') ) == '5' ? 'selected': '' }} required>Closing</option>
															<option value="6" {{ (old('status_id') ?? $lead->implode('status_id') ) == '6' ? 'selected': '' }} required>Spam</option>
															<option value="7" {{ (old('status_id') ?? $lead->implode('status_id') ) == '7' ? 'selected': '' }} required>Failed</option>
														</select>
														<span class="form-text text-muted">Please select an status.</span>
													</div>
												</div>
										 	</div>

											<div class="separator separator-dashed my-10"></div>

											<h1 class="pb-5">Data Order</h1>
										 	<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Full Name</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Full name"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user-friends" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your full name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Contact</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Enter contact number"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-phone" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter Customer contact</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Address</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Enter your address"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your address</span>
												</div>
											</div>
										 	<div class="separator separator-dashed my-10"></div>
											 <div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Product</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text"class="form-control" placeholder="Product Name"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-box" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter product name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Quantity</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" placeholder="Quantity Product" min="0" onchange="calculate(this.value)" id="quantity" name="quantity" value="{{ old('quantity') ?? $lead->implode('quantity') }}" id="inputquantity" class="form-control" aria-describedby="quantityHelpInline"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-boxes" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter quantity</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Price</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" placeholder="Enter price" min="0" id="price" name="price" value="{{ old('price') ?? $lead->implode('price') }}" id="inputprice" class="form-control" aria-describedby="priceHelpInline"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-money-bill-wave" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter price</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" name="option">
															<option value="" hidden>Promotion Type</option>
															<option>Promo 1</option>
															<option>Promo 2</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter promotion type</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Total</label>
												<div class="col-lg-7 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Total Price" disabled/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-filled total</span>
												</div>
											</div>
										 	<div class="separator separator-dashed my-10"></div>
										 	<div class="form-group row">
												<label class="col-lg-1 col-form-label text-lg-right">Payment</label>
												<div class="col-lg-3">
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="option">
															<option value="" hidden>Payment Method</option>
															<option>COD</option>
															<option>Transfer</option>
														</select>
														<span class="form-text text-muted">Select an payment method.</span>
													</div>
											  	</div>
										  		<label class="col-lg-1 col-form-label text-lg-right">Warehouse</label>
												<div class="col-lg-3">
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="option">
															<option value="" hidden>Warehouse</option>
															<option>Cilcap</option>
															<option>Kosambi</option>
															<option>Tandes.Sby</option>
														</select>
														<span class="form-text text-muted">Please select an status.</span>
													</div>
											  	</div>
										  		<label class="col-lg-1 col-form-label text-lg-right">Courier</label>
												<div class="col-lg-3">
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control" name="option">
															<option value="" hidden>Courier Type</option>
															<option>POS</option>
															<option>JNE</option>
															<option>JNT</option>
															<option>Ninja</option>
															<option>Sicepat</option>
														</select>
														<span class="form-text text-muted">Please select an status.</span>
													</div>
											  	</div>
										 	</div>
											<div class="separator separator-dashed my-10"></div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Upload The Proof</label>
												<div class="col-lg">
													<input class="form-control" value="" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
													<span class="form-text text-muted">Please upload the proof if you closing</span>
												</div>
											</div>

										</div>
										{{ csrf_field() }}
										<div class="card-footer">
										 	<div class="row">
										  		<div class="col-lg-5"></div>
										  		<div class="col-lg-7">
										   			<button type="reset" class="btn btn-primary mr-2">Submit</button>
										   			<button type="reset" class="btn btn-secondary">Cancel</button>
										  		</div>
										 	</div>
										</div>
									</form>
								</div>
								<!--end::Card body-->
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
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->

        <script>
            $(document).ready(function() {
                $('#event_id').on('change', function() {
                    var eventId = $(this).val();
                    if(eventId) {
                        $.ajax({
                            url: '/getEvent/'+eventId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    var productId = $(this).val();
                    if(productId) {
                        $.ajax({
                            url: '/getProduct/'+productId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
		<script type="text/javascript">
			function calculate(qty){
				{{--  var quantity = parseInt(document.getElementById('quantity').value);  --}}

				var price = parseInt(document.getElementById('price').value);

				var total = price * qty;

				var total_price = document.getElementById('total_price');
				total_price.value = total;
			}
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
